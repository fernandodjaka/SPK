<?php

namespace App\Models;

use CodeIgniter\Model;

class PerhitunganModel extends Model
{
    protected $table = 'penilaian'; // Tabel penilaian
    protected $primaryKey = 'id_penilaian';

    public function getPenilaian($idAlternatif, $idKriteria)
    {
        return $this->where('id_alternatif', $idAlternatif)
                    ->where('id_kriteria', $idKriteria)
                    ->first(); // Mengambil satu record
    }

    public function getKriteria()
    {
        // Ambil data kriteria dari tabel kriteria
        return $this->db->table('kriteria')->get()->getResultArray();
    }

    public function getAlternatif()
    {
        // Ambil data alternatif dari tabel alternatif
        return $this->db->table('alternatif')->get()->getResultArray();
    }

    public function insertHasil($idAlternatif, $nilai)
    {
        // Insert hasil perhitungan ke dalam tabel hasil
        $this->db->table('hasil')->insert([
            'id_alternatif' => $idAlternatif,
            'nilai' => $nilai
        ]);
    }

    public function truncateHasil()
    {
        // Menghapus semua data dari tabel hasil
        $this->db->table('hasil')->truncate();
    }
}
