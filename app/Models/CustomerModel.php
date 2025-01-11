<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';

    protected $allowedFields = [
        'nama_pelanggan', 
        'kode_pelanggan', 
        'email_pelanggan', 
        'no_telp_pelanggan', 
        'alamat_pelanggan', 
        'jenis_kelamin_pelanggan'
    ];

    // Validation rules
    protected $validationRules = [
        'nama_pelanggan'       => 'required|min_length[3]',
        'kode_pelanggan'       => 'required|is_unique[pelanggan.kode_pelanggan]',
        'email_pelanggan'      => 'required|valid_email',
        'no_telp_pelanggan'    => 'required|min_length[10]|numeric',
        'alamat_pelanggan'     => 'required',
        'jenis_kelamin_pelanggan' => 'required|in_list[Laki-laki,Perempuan]'
    ];

    // Custom error messages
    protected $validationMessages = [
        'kode_pelanggan' => [
            'is_unique' => 'Kode pelanggan sudah digunakan. Harap coba lagi dengan kode yang berbeda.'
        ]
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Soft deletes
    protected $useSoftDeletes = true;
    protected $deletedField   = 'deleted_at';

    // Get last pelanggan for kode generation
    public function getLastPelanggan()
    {
        return $this->orderBy('id_pelanggan', 'DESC')->first();
    }
}
