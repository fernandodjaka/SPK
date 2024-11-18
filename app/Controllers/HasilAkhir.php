<?php

namespace App\Controllers;

use App\Models\HasilModel;

class HasilAkhir extends BaseController
{
    protected $hasilModel;

    public function __construct()
    {
        $this->hasilModel = new HasilModel();
    }

    public function index()
    {
        // Cek peran pengguna
        $user_role = session()->get('role');
        if ($user_role !== 'B') {
            return redirect()->to('/login');
        }

        // Mendapatkan data hasil berdasarkan gender
        $data['title'] = "Hasil Akhir";
        $data['laki_laki'] = $this->hasilModel->getHasilByGender('laki-laki');
        $data['perempuan'] = $this->hasilModel->getHasilByGender('perempuan');

        return view('hasil_akhir', $data);
    }
}
