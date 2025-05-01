<?php
namespace App\Controllers;

use App\Models\KendaraanModel;
use App\Models\PemesananModel;
use CodeIgniter\Controller;

class Garasi_C extends Controller
{
    public function index()
    {
        $model = new KendaraanModel();

        // Ambil data kendaraan dan statusnya
        $query = $model->select('kendaraan.*, 
                                CASE 
                                    WHEN pemesanan.kendaraan_id IS NOT NULL AND 
                                         pemesanan.tanggal_akhir >= CURDATE() 
                                    THEN "Not Ready" 
                                    ELSE "Ready" 
                                END AS status_kendaraan')
                       ->join('pemesanan', 'pemesanan.kendaraan_id = kendaraan.id_kendaraan 
                          AND pemesanan.status = "approve" 
                          AND pemesanan.tanggal_awal <= CURDATE() 
                          AND pemesanan.tanggal_akhir >= CURDATE()', 'left')
                       ->findAll();

        // Kirim data kendaraan dengan status ke view
        $data['kendaraan'] = $query;

        return view('garasi/index', $data);
    }

    public function detail($id)
    {
        $model = new KendaraanModel();
        $kendaraan = $model->find($id);

        if (!$kendaraan) {
            return redirect()->to('/garasi')->with('error', 'Kendaraan tidak ditemukan');
        }

        // Model pemesanan untuk mengecek status kendaraan
        $pemesananModel = new PemesananModel();
        $status = 'Ready'; // Default status

        // Mengecek apakah ada pemesanan yang relevan
        $pemesanan = $pemesananModel->where('kendaraan_id', $id)
                                     ->where('status', 'approve')
                                     ->where('tanggal_awal <=', date('Y-m-d'))
                                     ->where('tanggal_akhir >=', date('Y-m-d'))
                                     ->first();

        if ($pemesanan) {
            $status = 'Not Ready';
        }

        // Kirim data kendaraan dan status ke view
        return view('garasi/detail', ['kendaraan' => $kendaraan, 'status' => $status]);
    }
}