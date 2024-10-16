<?php

namespace App\Controllers;

use \App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $validation;
    protected $pelangganModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'pelanggan' => $this->pelangganModel->findAll(),
        ];
        return view('pelanggan/view_data_pelanggan', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Pelanggan',
            'kode_pelanggan' => $this->pelangganModel->getKodePelanggan(),
        ];
        return view('pelanggan/add_data_pelanggan', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pelanggan',
            'kode_pelanggan' => $this->pelangganModel->getKodePelanggan(),
        ];

        // Validasi data form
        $this->validation->setRules($this->pelangganModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $pelanggan = array(
                'kode_pelanggan' => $data['kode_pelanggan'],
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'no_telp_pelanggan' => $this->request->getPost('no_telp_pelanggan'),
                'email_pelanggan' => $this->request->getPost('email_pelanggan'),
                'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
                'jenis_kelamin_pelanggan' => $this->request->getPost('jenis_kelamin_pelanggan'),
            );
            $this->pelangganModel->createPelanggan($pelanggan);
            session()->setFlashdata('success', 'Data Pelanggan berhasil disimpan');
            return redirect()->to('pelanggan');
        } else {
            $data['validation'] = $this->validation;
            return view('pelanggan/add_data_pelanggan', $data);
        }
    }

    // Method baru untuk menangani form pemesanan dari view.detail.php
    public function saveOrder()
    {
        // Validasi input dari form
        $this->validation->setRules([
            'no_telp_pelanggan' => 'required|max_length[13]',
            'alamat_pelanggan' => 'required',
            'jenis_kelamin_pelanggan' => 'required'
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            $data['validation'] = $this->validation;
            return view('pelanggan/view_detail_pelanggan', $data); // Tampilkan kembali form jika gagal validasi
        }

        // Data Pelanggan
        $pelanggan = [
            'nama_pelanggan' => session()->get('username'), // Menggunakan data dari session
            'email_pelanggan' => session()->get('email'),
            'no_telp_pelanggan' => $this->request->getPost('no_telp_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'jenis_kelamin_pelanggan' => $this->request->getPost('jenis_kelamin_pelanggan')
        ];

        // Simpan ke database
        $this->pelangganModel->createPelanggan($pelanggan);

        session()->setFlashdata('success', 'Pemesanan berhasil disimpan');
        return redirect()->to('pelanggan'); // Redirect ke halaman pelanggan
    }

    public function edit($id)
    {
        $pelanggan = $this->pelangganModel->getById($id);
        $data = [
            'title' => 'Edit Data Pelanggan',
            'pelanggan' => $pelanggan,
        ];

        $this->validation->setRules($this->pelangganModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $pelanggan = array(
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'no_telp_pelanggan' => $this->request->getPost('no_telp_pelanggan'),
                'email_pelanggan' => $this->request->getPost('email_pelanggan'),
                'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
                'jenis_kelamin_pelanggan' => $this->request->getPost('jenis_kelamin_pelanggan'),
            );
            $this->pelangganModel->updatePelanggan($pelanggan, $id);
            session()->setFlashdata('success', 'Data Pelanggan berhasil diubah');
            return redirect()->to('pelanggan');
        } else {
            return view('pelanggan/edit_data_pelanggan', $data);
        }
    }

    public function delete($id)
    {
        $this->pelangganModel->deletePelanggan($id);
        session()->setFlashdata('success', 'Data Pelanggan berhasil dihapus');
        return redirect()->to('pelanggan');
    }
}
