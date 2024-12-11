<?php

namespace App\Controllers;

use App\Models\KendaraanModel;
use App\Controllers\BaseController;

class Customer extends BaseController
{
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

    public function detail($id)
    {
        $model = new KendaraanModel();
        $data['kendaraan'] = $model->find($id); // Assuming the model has a find method

        if (!$data['kendaraan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kendaraan dengan ID $id tidak ditemukan");
        }

        return view('customer/detail', $data);
    }

    public function getCarDetails($id_kendaraan)
    {
        // Inisialisasi model kendaraan
        $kendaraanModel = new KendaraanModel();
        $kendaraan = $kendaraanModel->find($id_kendaraan);

        if (!$kendaraan) {
            // Mengembalikan error jika kendaraan tidak ditemukan
            return $this->response->setJSON(['error' => 'Car details not found!']);
        }

        // Mengembalikan view atau konten HTML yang akan ditampilkan di dalam modal
        return view('detail', ['kendaraan' => $kendaraan]);
    }

    public function createCustomer()
    {
        if ($this->request->getMethod() === 'post') {
            // Mengambil data dari form
            $data = [
                'kode_pelanggan' => $this->request->getPost('kode_pelanggan'),
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'no_telp_pelanggan' => $this->request->getPost('no_telp_pelanggan'),
                'email_pelanggan' => $this->request->getPost('email_pelanggan'),
                'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
                'jenis_kelamin_pelanggan' => $this->request->getPost('jenis_kelamin_pelanggan'),
            ];

            // Validasi data (tambahkan validasi sesuai kebutuhan)
            if (!$this->validate([
                'nama_pelanggan' => 'required|min_length[3]',
                'no_telp_pelanggan' => 'required|numeric',
                'email_pelanggan' => 'required|valid_email',
                'alamat_pelanggan' => 'required',
                'jenis_kelamin_pelanggan' => 'required',
            ])) {
                // Mengembalikan kesalahan jika validasi gagal
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }

            // Menginisialisasi model pelanggan
            $pelangganModel = new \App\Models\PelangganModel();
            $pelangganModel->insert($data);

            // Redirect atau memberikan notifikasi sukses
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
}