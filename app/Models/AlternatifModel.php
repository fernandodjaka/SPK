<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternatifModel extends Model
{
    protected $table = 'alternatif'; // Nama tabel di database
    protected $primaryKey = 'id_alternatif'; // Kolom primary key
    protected $allowedFields = ['nama', 'jk']; // Kolom yang bisa diisi
}
