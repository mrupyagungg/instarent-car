<?php

namespace App\Controllers;

use App\Models\PemesananModel;

class Riwayat extends BaseController
{
    public function index()
    {
        // Misalnya, ambil data pemesanan berdasarkan ID user yang sedang login
        $userId = session()->get('user_id'); // Pastikan session sudah diset
        $pemesananModel = new PemesananModel();
        $riwayat = $pemesananModel->where('user_id', $userId)->findAll();

        return view('riwayat/index', ['riwayat' => $riwayat]);
    }
}