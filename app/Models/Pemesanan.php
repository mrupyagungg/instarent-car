<?php

namespace App\Models;

use CodeIgniter\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans'; // Nama tabel
    protected $primaryKey = 'id_pemesanan'; // Primary key tabel

    // Kolom yang diizinkan untuk operasi mass-assignment
    protected $allowedFields = [
        'kendaraan_id',
        'tanggal_awal',
        'tanggal_akhir',
        'lama_pemesanan',
        'total_harga',
        'created_at',
        'updated_at',
    ];

    // Mengaktifkan fitur timestamps
    protected $useTimestamps = true;

    // Validasi data input
    protected $validationRules = [
        'kendaraan_id'    => 'required|integer',
        'tanggal_awal'    => 'required|valid_date',
        'tanggal_akhir'   => 'required|valid_date',
        'lama_pemesanan'  => 'required|integer',
        'total_harga'     => 'required|decimal',
    ];

    protected $validationMessages = [
        'kendaraan_id' => [
            'required' => 'ID kendaraan wajib diisi.',
            'integer'  => 'ID kendaraan harus berupa angka.',
        ],
        'tanggal_awal' => [
            'required'    => 'Tanggal awal wajib diisi.',
            'valid_date'  => 'Tanggal awal harus dalam format tanggal yang valid.',
        ],
        'tanggal_akhir' => [
            'required'    => 'Tanggal akhir wajib diisi.',
            'valid_date'  => 'Tanggal akhir harus dalam format tanggal yang valid.',
        ],
        'lama_pemesanan' => [
            'required' => 'Lama pemesanan wajib diisi.',
            'integer'  => 'Lama pemesanan harus berupa angka.',
        ],
        'total_harga' => [
            'required' => 'Total harga wajib diisi.',
            'decimal'  => 'Total harga harus berupa angka desimal.',
        ],
    ];
}