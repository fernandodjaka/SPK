<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $allowedFields = ['kode_kriteria', 'nama', 'type', 'bobot'];
    
    // Jika Anda menggunakan timestamps
    protected $useTimestamps = false; 
}
