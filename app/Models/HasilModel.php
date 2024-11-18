<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table = 'hasil';
    protected $primaryKey = 'id_penilaian';

    public function getHasilByGender($gender)
    {
        return $this->join('alternatif', 'hasil.id_alternatif = alternatif.id_alternatif')
                    ->where('alternatif.jk', $gender)
                    ->orderBy('hasil.nilai', 'DESC')
                    ->findAll();
    }
}
