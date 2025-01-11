<?php

namespace App\Controllers;

use App\Models\{KendaraanModel, PelangganModel, PemesananModel,CustomerModel};
use App\Controllers\BaseController;

class Customer extends BaseController
{
    protected $pelangganModel;

    public function index()
    {
        $data = [
            'title' => 'Dashboard Customer',
        ];

        // Memuat helper URL
        helper('url');

        // Mengambil data kendaraan dari model
        $kendaraanModel = new KendaraanModel();
        $kendaraans = $kendaraanModel->findAll();

        // Mengambil kolom 'jenis_kendaraan' dan menghilangkan duplikasi
        $jenisKendaraan = array_unique(array_column($kendaraans, 'jenis_kendaraan'));

        // Menyiapkan data untuk dikirim ke view
        $data['jenisKendaraan'] = $jenisKendaraan;
        $data['kendaraans'] = $kendaraans;

        return view('customer/dashboard', $data);
    }

    public function __construct()
    {
        // Instantiate the PelangganModel
        $this->pelangganModel = new PelangganModel();
    }

    public function store()
    {
        // Data validation
        $validationRules = [
            'nama_pelanggan' => 'required|min_length[3]',
            'email_pelanggan' => 'required|valid_email',
            'no_telp_pelanggan' => 'required|min_length[10]',
            'alamat_pelanggan' => 'required',
            'jenis_kelamin_pelanggan' => 'required|in_list[Laki-laki,Perempuan]',
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
    
        // Prepare customer data
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'email_pelanggan' => $this->request->getPost('email_pelanggan'),
            'no_telp_pelanggan' => $this->request->getPost('no_telp_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'jenis_kelamin_pelanggan' => $this->request->getPost('jenis_kelamin_pelanggan'),
        ];
    
        // Start database transaction
        $db = \Config\Database::connect();
        $db->transStart();
    
        // Generate kode_pelanggan
        $data['kode_pelanggan'] = $this->generateKodePelanggan();
    
        if (!$this->pelangganModel->insert($data)) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    
        // Commit transaction
        $db->transComplete();
    
        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Gagal menyimpan data pelanggan.');
        }
    
        return redirect()->back()->with('success', 'Data pelanggan berhasil disimpan.');
    }
    

    private function generateKodePelanggan()
{
    // Define the prefix for the customer code
    $kodeAwal = 'PLGN-';
    $kodeUrut = 1; // Default start value

    do {
        // Get the last kode_pelanggan from the database
        $lastPelanggan = $this->pelangganModel->orderBy('kode_pelanggan', 'DESC')->first();

        if ($lastPelanggan) {
            // Extract the numeric part of the last kode_pelanggan and increment by 1
            $kodeUrut = (int) substr($lastPelanggan['kode_pelanggan'], strlen($kodeAwal)) + 1;
        }

        // Ensure the generated code has a fixed length (e.g., PLGN-001)
        $kodeBaru = $kodeAwal . str_pad($kodeUrut, 3, '0', STR_PAD_LEFT);

        // Check if the generated code already exists
        $exists = $this->pelangganModel->where('kode_pelanggan', $kodeBaru)->countAllResults() > 0;

    } while ($exists);

    return $kodeBaru;
}

public function getLastPelanggan()
{
    return $this->orderBy('id_pelanggan', 'DESC')->first();
}
  
    public function createCustomer()
    {
        if ($this->request->getMethod() === 'post') {
            // Prepare customer data
            $data = [
                'kode_pelanggan' => $this->request->getPost('kode_pelanggan'),
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'no_telp_pelanggan' => $this->request->getPost('no_telp_pelanggan'),
                'email_pelanggan' => $this->request->getPost('email_pelanggan'),
                'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
                'jenis_kelamin_pelanggan' => $this->request->getPost('jenis_kelamin_pelanggan'),
            ];
    
            // Validate data
            if (!$this->validate([
                'nama_pelanggan' => 'required|min_length[3]',
                'no_telp_pelanggan' => 'required|numeric',
                'email_pelanggan' => 'required|valid_email',
                'alamat_pelanggan' => 'required',
                'jenis_kelamin_pelanggan' => 'required',
            ])) {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }
    
            // Insert data into the database
            $pelangganModel = new PelangganModel();
            $pelangganModel->insert($data);
    
            return redirect()->to('/pelanggan')->with('success', 'Customer added successfully!');
        }
    
        return view('customer/create');
    }
    
    public function show($id)
    {
        $model = new KendaraanModel();
        $kendaraan = $model->find($id);
    
        if (!$kendaraan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kendaraan tidak ditemukan');
        }
    
        return view('customer/detail', ['kendaraan' => $kendaraan]);
    }
    
    public function add_data_pelanggan($id_kendaraan)
    {
        $pemesananModel = new PemesananModel();
    
        $data = [
            'id_kendaraan' => $id_kendaraan,
            'tanggal_awal' => $this->request->getPost('tanggal_awal'),
            'tanggal_akhir' => $this->request->getPost('tanggal_akhir'),
            'lama_pemesanan' => $this->request->getPost('lama_pemesanan'),
            'total_harga' => str_replace(['Rp', '.', ' '], '', $this->request->getPost('total_harga')),
        ];
    
        $pemesananModel->save($data);
    
        return redirect()->to('/pemesanan')->with('success', 'Detail pemesanan berhasil disimpan.');
    }
    

    public function getCarDetails($id_kendaraan)
    {
        $kendaraanModel = new KendaraanModel();
        $kendaraan = $kendaraanModel->find($id_kendaraan);

        if (!$kendaraan) {
            return $this->response->setJSON(['error' => 'Car details not found!']);
        }

        return view('detail', ['kendaraan' => $kendaraan]);
    }

    public function detail($id)
    {
        $model = new KendaraanModel();
        $data['kendaraan'] = $model->find($id);

        if (!$data['kendaraan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kendaraan dengan ID $id tidak ditemukan");
        }

        return view('customer/detail', $data);
    }
}