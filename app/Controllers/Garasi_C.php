<?php

namespace App\Controllers;

use App\Models\KendaraanModel;
use CodeIgniter\Controller;

class Garasi_C extends Controller
{
    public function index()
    {
        $model = new KendaraanModel(); 
        $data['kendaraan'] = $model->findAll(); // Ambil semua data kendaraan

        return view('garasi/index', $data); // Kirim data ke view
    }

    public function detail($id)
    {
        $model = new KendaraanModel();
        $kendaraan = $model->find($id);

        if (!$kendaraan) {
            return redirect()->to('/garasi')->with('error', 'Kendaraan tidak ditemukan');
        }

        return view('garasi/detail', ['kendaraan' => $kendaraan]);
    }
}