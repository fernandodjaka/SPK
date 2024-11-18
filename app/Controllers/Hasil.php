<?php

namespace App\Controllers;

use App\Models\HasilModel;
use App\Models\AlternatifModel;

class Hasil extends BaseController
{
    protected $hasilModel;
    protected $alternatifModel;

    public function __construct()
    {
        $this->hasilModel = new HasilModel();
        $this->alternatifModel = new AlternatifModel();
    }

    public function index()
    {
        // Cek peran pengguna
        $user_role = session()->get('role');
        if ($user_role !== 'A' && $user_role !== 'B') {
            return redirect()->to('/login');
        }

        $data['title'] = "Hasil Akhir";
        $data['laki_laki'] = $this->hasilModel->getHasilByGender('laki-laki');
        $data['perempuan'] = $this->hasilModel->getHasilByGender('perempuan');

        return view('hasil', $data);
    }
}
