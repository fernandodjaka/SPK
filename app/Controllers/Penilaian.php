<?php

namespace App\Controllers;

use App\Models\PenilaianModel;
use App\Models\AlternatifModel;
use App\Models\KriteriaModel;

class Penilaian extends BaseController
{
    protected $penilaianModel;
    protected $alternatifModel;
    protected $kriteriaModel;

    public function __construct()
    {
        $this->penilaianModel = new PenilaianModel();
        $this->alternatifModel = new AlternatifModel();
        $this->kriteriaModel = new KriteriaModel();
    }

    public function index()
    {
        // Ambil data alternatif
        $alternatif = $this->alternatifModel->findAll();

        // Ambil data penilaian untuk setiap alternatif
        $penilaian = [];
        foreach ($alternatif as $alt) {
            $penilaian[$alt['id_alternatif']] = $this->penilaianModel
                ->where('id_alternatif', $alt['id_alternatif'])
                ->findAll();
        }

        // Kirim data ke view
        return view('list_penilaian', [
            'alternatif' => $alternatif,
            'penilaian'  => $penilaian,
            'kriteria'   => $this->kriteriaModel->findAll(), // Menambahkan kriteria untuk view
        ]);
    }

    public function edit($id_alternatif)
    {
        // Ambil data kriteria dan penilaian untuk alternatif yang dipilih
        $kriteria = $this->kriteriaModel->findAll();
        $penilaian = $this->penilaianModel->where('id_alternatif', $id_alternatif)->findAll();

        return view('edit_penilaian', [
            'id_alternatif' => $id_alternatif,
            'kriteria'      => $kriteria,
            'penilaian'     => $penilaian
        ]);
    }

    public function update()
    {
        // Ambil data dari request
        $id_alternatif = $this->request->getPost('id_alternatif');
        $id_kriteria   = $this->request->getPost('id_kriteria');
        $nilai         = $this->request->getPost('nilai');

        // Validasi
        if (!$id_kriteria || !$id_alternatif || !$nilai) {
            return redirect()->back()->with('errors', ['Semua data harus diisi']);
        }

        // Hapus penilaian sebelumnya untuk alternatif ini
        $this->penilaianModel->where('id_alternatif', $id_alternatif)->delete();

        // Masukkan penilaian baru
        foreach ($nilai as $index => $val) {
            $this->penilaianModel->insert([
                'id_alternatif' => $id_alternatif,
                'id_kriteria'   => $id_kriteria[$index],
                'nilai'         => $val,
            ]);
        }

        return redirect()->to('/list-penilaian')->with('success', 'Data penilaian berhasil diupdate');
    }

    // Tambahkan method hapus jika diperlukan
    public function hapus($id_alternatif)
    {
        $this->penilaianModel->where('id_alternatif', $id_alternatif)->delete();
        return redirect()->to('/list-penilaian')->with('success', 'Data penilaian berhasil dihapus');
    }
}
