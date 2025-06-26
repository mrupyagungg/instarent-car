<?php
namespace App\Controllers;

<<<<<<< HEAD
=======
use App\Models\KendaraanModel;
use App\Models\PemesananModel;
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
use CodeIgniter\Controller;

class Garasi_C extends Controller
{
<<<<<<< HEAD
    // Method untuk mendapatkan kendaraan yang tersedia (belum dipesan)
     public function getAvailable()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kendaraan');
        $builder->select('kendaraan.*');
        $builder->whereNotIn('id_kendaraan', function ($subQuery) {
            return $subQuery->select('kendaraan_id')
                ->from('pemesanan')
                ->where('status_pesan', 'pesan'); // kendaraan yang sedang dipesan akan disembunyikan
        });

        // Hanya tampilkan kendaraan yang ready (opsional)
        $builder->where('status_kendaraan', 'ready');

        return $builder->get()->getResultArray();
    }   

   public function index()
    {
        // Ambil kendaraan yang ready (tersedia)
        $kendaraan_ready = $this->getAvailable();

        // Ambil kendaraan yang sedang dipesan (Not Ready)
        $db = \Config\Database::connect();
        $builder = $db->table('kendaraan');
        $builder->select('kendaraan.*');
        $builder->join('pemesanan', 'pemesanan.kendaraan_id = kendaraan.id_kendaraan', 'inner');
        $builder->where('pemesanan.status', 'approve');
        $builder->where('pemesanan.tanggal_awal <=', date('Y-m-d'));
        $builder->where('pemesanan.tanggal_akhir >=', date('Y-m-d'));
        $kendaraan_dipesan = $builder->get()->getResultArray();

        // ✅ Tambahkan pengecekan pelanggan dari session
        $user_id = session()->get('user_id');
        $pelanggan = null;
        if ($user_id) {
            $pelangganModel = new \App\Models\PelangganModel();
            $pelanggan = $pelangganModel->where('user_id', $user_id)->first();
        }

        $data = [
            'kendaraan_ready'   => $kendaraan_ready,
            'kendaraan_dipesan' => $kendaraan_dipesan,
            'pelanggan'         => $pelanggan, // dikirim ke view
        ];
=======
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
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1

        return view('garasi/index', $data);
    }

<<<<<<< HEAD
=======
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
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
}