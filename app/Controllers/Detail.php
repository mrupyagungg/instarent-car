<?php

namespace App\Controllers;

use App\Models\KendaraanModel;

class Detail extends BaseController
{
    public function index($id)
    {
        $model = new KendaraanModel();
        $kendaraan = $model->find($id);

        if (!$kendaraan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kendaraan dengan ID $id tidak ditemukan");
        }

        $data = [
            'kendaraan' => $kendaraan,
        ];

        return view('detail', $data);
    }
}
