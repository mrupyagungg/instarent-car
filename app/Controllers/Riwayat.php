<?php

namespace App\Controllers;

<<<<<<< HEAD
use App\Controllers\BaseController;
=======
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
use App\Models\PemesananModel;

class Riwayat extends BaseController
{
    public function index()
    {
<<<<<<< HEAD
        // Cek apakah user sudah login
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Koneksi ke database
        $db = \Config\Database::connect();

        // Ambil data riwayat pemesanan user
        $riwayat = $db->table('pemesanan')
            ->select('
                pemesanan.*,
                kendaraan.nama_kendaraan,
                kendaraan.gambar_kendaraan,
                kendaraan.merk_kendaraan,
                kendaraan.harga_sewa_kendaraan,
                kendaraan.jenis_kendaraan,
                kendaraan.warna_kendaraan,
                kendaraan.tahun_kendaraan,
                pelanggan.nama_pelanggan,
                pelanggan.email_pelanggan,
                pelanggan.no_telp_pelanggan
            ')
            ->join('kendaraan', 'kendaraan.id_kendaraan = pemesanan.kendaraan_id')
            ->join('pelanggan', 'pelanggan.user_id = pemesanan.user_id')
            ->where('pemesanan.user_id', $userId)
            ->orderBy('pemesanan.tanggal_pemesanan', 'DESC')
            ->get()
            ->getResultArray();

        // Kirim ke view
        return view('riwayat/index', [
            'riwayat' => $riwayat
        ]);
=======
        // Misalnya, ambil data pemesanan berdasarkan ID user yang sedang login
        $userId = session()->get('user_id'); // Pastikan session sudah diset
        $pemesananModel = new PemesananModel();
        $riwayat = $pemesananModel->where('user_id', $userId)->findAll();

        return view('riwayat/index', ['riwayat' => $riwayat]);
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
    }
}