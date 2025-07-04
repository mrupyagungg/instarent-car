<?php
namespace App\Controllers;

use \App\Models\KendaraanModel;
use \App\Models\Laporan\JurnalModel;
use \App\Models\PelangganModel;
use \App\Models\PemesananModel;

class Pemesanan extends BaseController
{
    protected $validation;
    protected $pemesanans;
    protected $kendaraanModel;
    protected $jurnalModel;
    protected $pelangganModel;

    public function __construct()
    {
        // Load validation service and models
        $this->validation = \Config\Services::validation();
        $this->pemesanans = new PemesananModel();
        $this->kendaraanModel = new KendaraanModel();
        $this->jurnalModel = new JurnalModel();
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Transaksi Penerimaan',
            'pemesanan' => $this->pemesanans->getAll(),
            // 'lastPelanggan' => $lastPelanggan,
        ];
        return view('pemesanan/view_data_pemesanan', $data);
    }

<<<<<<< HEAD
 public function create($id_kendaraan = null)
{
    // Pastikan kendaraan ID dikirim
    if (!$id_kendaraan) {
        session()->setFlashdata('error', 'Kendaraan tidak ditemukan.');
        return redirect()->to(base_url('/'));
    }

    // Ambil kendaraan yang dipilih
    $kendaraanDipilih = $this->kendaraanModel->find($id_kendaraan);
    if (!$kendaraanDipilih) {
        session()->setFlashdata('error', 'Data kendaraan tidak ditemukan.');
        return redirect()->back();
    }

    // Cek user login
    $user_id = session()->get('user_id');
    if (!$user_id) {
        session()->setFlashdata('error', 'Silakan login terlebih dahulu.');
        return redirect()->to(base_url('login'));
    }

    // Ambil data pelanggan berdasarkan user_id
    $pelanggan = $this->pelangganModel->where('user_id', $user_id)->first();
    if (!$pelanggan) {
        session()->setFlashdata('error', 'Data pelanggan tidak ditemukan.');
        return redirect()->back();
    }

    // Generate kode pemesanan
    $kode_pemesanan = $this->pemesanans->getKodePemesanan();

    // Jika form disubmit dan valid
    if ($this->request->getMethod() === 'post') {
        $this->validation->setRules($this->pemesanans->rules());
        if ($this->validation->withRequest($this->request)->run()) {
            $lama_pemesanan = $this->request->getPost('lama_pemesanan');
            $total_harga = $lama_pemesanan * $kendaraanDipilih['harga_sewa_kendaraan'];

           
        // Upload file jaminan
        $jaminan_identitas = $this->request->getFile('jaminan_identitas');
        if (!is_dir(ROOTPATH . 'uploads/images/')) {
            mkdir(ROOTPATH . 'uploads/images/', 0777, true);
        }
        
        $fileName = time() . '.' . $jaminan_identitas->getExtension();
        $jaminan_identitas->move('uploads/images/', $fileName);

            // Simpan pemesanan
            $this->pemesanans->insert([
=======
    public function create()
    {
        // Ambil data kendaraan berdasarkan ID yang dipilih dari form
        $id_kendaraan = $this->request->getPost('kendaraan_id');
        $kendaraan = $this->kendaraanModel->find($id_kendaraan);
        $pelanggan = $this->pelangganModel->orderBy('id_pelanggan', 'DESC')->findAll();
        $lastPelanggan = $this->pelangganModel->orderBy('id_pelanggan', 'DESC')->first(); // Ambil pelanggan terakhir


        // Validasi jika kendaraan tidak ditemukan
        if (!$kendaraan) {
            session()->setFlashdata('error', 'Data kendaraan tidak ditemukan.');
            return redirect()->back();
        }

        // Ambil kode pemesanan baru
        $kode_pemesanan = $this->pemesanans->getKodePemesanan();

        // Kirim data ke view
        $data = [
            'title' => 'Tambah Data Pemesanan',
            'kode_pemesanan' => $kode_pemesanan,
            'pelanggan' => $this->pelangganModel->findAll(),
            'kendaraan' => $kendaraan,
            'lastPelanggan' => $lastPelanggan,
        ];

        // Validasi data pemesanan
        $this->validation->setRules($this->pemesanans->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            // Hitung total harga berdasarkan lama pemesanan
            $harga_sewa = $kendaraan['harga_sewa_kendaraan'];
            $lama_pemesanan = $this->request->getPost('lama_pemesanan');
            $total_harga = $lama_pemesanan * $harga_sewa;
            $jaminan_identitas = $this->request->getFile('jaminan_identitas');
        
            if (!is_dir(ROOTPATH . 'uploads/images/')) {
                mkdir(ROOTPATH . 'uploads/images/', 0777, true);
            }
        
            $fileName = time() . '.' . $jaminan_identitas->getExtension();
            $jaminan_identitas->move('uploads/images/', $fileName);
        
            // Simpan data pemesanan
            $pemesanan = [
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                'kode_pemesanan' => $kode_pemesanan,
                'lama_pemesanan' => $lama_pemesanan,
                'tanggal_pemesanan' => $this->request->getPost('tanggal_pemesanan'),
                'tanggal_awal' => $this->request->getPost('tanggal_awal'),
                'tanggal_akhir' => $this->request->getPost('tanggal_akhir'),
                'total_harga' => $total_harga,
                'jaminan_identitas' => $fileName,
<<<<<<< HEAD
                'pelanggan_id' => $pelanggan['id_pelanggan'],
                'kendaraan_id' => $id_kendaraan,
                'status' => 'approve',
                'user_id' => $user_id
            ]);

            // Simpan jurnal transaksi (versi semula)
            $jurnal = [
                [
                    'tanggal' => date('Y-m-d'),
                    'id_akun' => 102,
                    'nominal' => $total_harga,
                    'posisi' => 'd',
                    'reff' => $kode_pemesanan,
                    'transaksi' => 'Bank',
=======
                'pelanggan_id' => $this->request->getPost('pelanggan_id'),
                'kendaraan_id' => $id_kendaraan,
                'status' => 'approve',
            ];
        
            // Insert pemesanan ke database
            $this->pemesanans->insert($pemesanan);
        
            // Insert data jurnal transaksi
            $jurnal = [
                [
                    'tanggal' => date('Y-m-d'),
                    'id_akun' => 101,
                    'nominal' => $total_harga,
                    'posisi' => 'd',
                    'reff' => $kode_pemesanan,
                    'transaksi' => 'Kas',
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'id_akun' => 401,
                    'nominal' => $total_harga,
                    'posisi' => 'k',
                    'reff' => $kode_pemesanan,
                    'transaksi' => 'Pendapatan Sewa',
                ],
            ];
<<<<<<< HEAD
            $this->jurnalModel->insertBatch($jurnal);

            return redirect()->to(base_url('payment/checkout/' . $kode_pemesanan));
        }
    }

    // Tampilkan form jika belum disubmit atau validasi gagal
    return view('pemesanan/add_data_pemesanan', [
        'title' => 'Tambah Data Pemesanan',
        'kode_pemesanan' => $kode_pemesanan,
        'pelanggan' => $pelanggan,
        'kendaraanDipilih' => $kendaraanDipilih,
        'validation' => $this->validation
    ]);
}


=======
        
            // Insert batch jurnal ke database
            $this->jurnalModel->insertBatch($jurnal);
        
            // Redirect ke halaman pembayaran Midtrans
            return redirect()->to(base_url('payment/checkout/' . $kode_pemesanan));
        }
        

        // Jika validasi gagal, tampilkan form dengan error
        $data['validation'] = $this->validation;
        return view('pemesanan/add_data_pemesanan', $data);
    }

>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
    public function downloadNota($id)
    {
        // Ambil data pemesanan berdasarkan ID
        $pemesanan = $this->pemesanans->find($id);

        if (!$pemesanan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        // Ambil data pelanggan dan kendaraan terkait
        $pelanggan = $this->pelangganModel->find($pemesanan['pelanggan_id']);
        $kendaraan = $this->kendaraanModel->find($pemesanan['kendaraan_id']);
        

        // Format konten nota pemesanan
        $content = "Nota Pemesanan\n\n";
        $content .= "Kode Pemesanan: {$pemesanan['kode_pemesanan']}\n";
        $content .= "Nama Pelanggan: {$pelanggan['nama_pelanggan']}\n";
        $content .= "Nama Kendaraan: {$kendaraan['nama_kendaraan']}\n";
        $content .= "Tanggal Pemesanan: {$pemesanan['tanggal_awal']}\n";
        $content .= "Lama Pemesanan: {$pemesanan['lama_pemesanan']} Hari\n";
        $content .= "Total Harga: {$pemesanan['total_harga']}\n";

        // Nama file nota
        $fileName = 'nota_pemesanan_' . $pemesanan['kode_pemesanan'] . '.txt';

        // Return file nota sebagai download
        return $this->response
            ->setHeader('Content-Type', 'text/plain')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $fileName . '"')
            ->setBody($content);
    }

    public function approve($id)
    {
        // Ambil data pemesanan berdasarkan ID
        $pemesanan = $this->pemesanans->find($id);

        if (!$pemesanan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        // Update status pemesanan menjadi approved
        $this->pemesanans->update($id, ['persetujuan' => 'approved']);
        session()->setFlashdata('success', 'Pemesanan telah disetujui');
        return redirect()->to(base_url('pemesanan'));
    }

    public function disapprove($id)
    {
        // Ambil data pemesanan berdasarkan ID
        $pemesanan = $this->pemesanans->find($id);

        if (!$pemesanan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        // Update status pemesanan menjadi disapproved
        $this->pemesanans->update($id, ['persetujuan' => 'disapproved']);
        session()->setFlashdata('success', 'Pemesanan tidak disetujui');
        return redirect()->to(base_url('pemesanan'));
    }
}