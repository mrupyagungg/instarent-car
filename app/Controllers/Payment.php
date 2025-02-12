<?php

namespace App\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\PemesananModel; // Pastikan model digunakan
use App\Models\PelangganModel; // Pastikan model digunakan
use App\Models\KendaraanModel; // Pastikan model digunakan

class Payment extends BaseController
{
    protected $pemesananModel;
    protected $pelangganModel;
    protected $kendaraanModel;

    public function __construct()
    {
        $pemesananModel = new PemesananModel();
        $pelangganModel = new PelangganModel();
        $kendaraanModel = new KendaraanModel();
       

        // Konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-RAoOP_cCGWrC0JjJVrXOU7vn'; // Ganti dengan server key asli
        Config::$isProduction = false; // Ubah ke true jika di production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function checkout($kode_pemesanan)
    {
        
        // Load model pemesanan
        $pemesananModel = new \App\Models\PemesananModel();
        $pelangganModel = new \App\Models\PelangganModel(); // Model pelanggan
        
        
        // Ambil data pemesanan berdasarkan kode pemesanan
        $pemesanan = $pemesananModel->where('kode_pemesanan', $kode_pemesanan)->first();

        if (!$pemesanan) {
            return redirect()->to('/pemesanan')->with('error', 'Data pemesanan tidak ditemukan');
        }

        // Ambil data pelanggan berdasarkan ID pelanggan dari pemesanan
        $pelanggan = $pelangganModel->find($pemesanan['pelanggan_id']);

        if (!$pelanggan) {
            return redirect()->to('/pemesanan')->with('error', 'Data pelanggan tidak ditemukan');
        }

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = 'SB-Mid-server-RAoOP_cCGWrC0JjJVrXOU7vn';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Data transaksi dari database
        $transaction = [
            'transaction_details' => [
                'order_id' => $pemesanan['kode_pemesanan'],
                'gross_amount' => $pemesanan['total_harga'],
            ],
            'customer_details' => [
                'first_name' => $pelanggan['nama_pelanggan'],
                'email' => $pelanggan['email_pelanggan'],
                'phone' => $pelanggan['no_telp_pelanggan'],
            ],
        ];

        // Generate Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($transaction);

        // Kirim data ke view
        return view('payment/checkout', ['snapToken' => $snapToken, 'pemesanan' => $pemesanan]);
    }

    public function notification()
    {
        // Tangkap data notifikasi dari Midtrans
        $json = file_get_contents('php://input');
        $notification = json_decode($json);

        if ($notification) {
            $order_id = $notification->order_id;
            $transaction_status = $notification->transaction_status;

            // Update status pembayaran di database
            if ($transaction_status == 'settlement') {
                $this->pemesananModel
                    ->where('kode_pemesanan', $order_id)
                    ->set(['status_pembayaran' => 'Lunas'])
                    ->update();
            } elseif ($transaction_status == 'pending') {
                $this->pemesananModel
                    ->where('kode_pemesanan', $order_id)
                    ->set(['status_pembayaran' => 'Menunggu Pembayaran'])
                    ->update();
            } elseif ($transaction_status == 'expire') {
                $this->pemesananModel
                    ->where('kode_pemesanan', $order_id)
                    ->set(['status_pembayaran' => 'Kadaluarsa'])
                    ->update();
            } elseif ($transaction_status == 'cancel') {
                $this->pemesananModel
                    ->where('kode_pemesanan', $order_id)
                    ->set(['status_pembayaran' => 'Dibatalkan'])
                    ->update();
            }

            return json_encode(['message' => 'Notification processed']);
        }
    }
}