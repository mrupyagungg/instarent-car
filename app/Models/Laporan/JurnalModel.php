<?php

namespace App\Models\Laporan;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table      = 'jurnal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'tanggal', 'id_akun', 'nominal', 'posisi', 'reff', 'transaksi'];

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getJurnal($month = '', $year = '')
    {
        $builder = $this->db->table('jurnal');
        $builder->select('*');
        $builder->join('akun', 'akun.id_akun=jurnal.id_akun');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->orderBy('id', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function createOrderJurnal($data)
    {
        $query = $this->db->table('jurnal')->insertBatch($data);
        return $query;
    }

    public function updateJurnal($data, $id)
    {
        $query = $this->db->table('jurnal')->update($data, array('id' => $id));
        return $query;
    }
}
