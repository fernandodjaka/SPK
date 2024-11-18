<?php

namespace App\Controllers;

use App\Models\PerhitunganModel;

class Perhitungan extends BaseController
{
    protected $perhitunganModel;

    public function __construct()
    {
        $this->perhitunganModel = new PerhitunganModel();
    }

    public function index()
    {
        // Menghapus hasil perhitungan sebelumnya
        $this->perhitunganModel->truncateHasil();

        // Mengambil data kriteria dan alternatif
        $kriterias = $this->perhitunganModel->getKriteria();
        $alternatifs = $this->perhitunganModel->getAlternatif();

        // Menghitung matriks X
        $matriksX = $this->calculateMatriksX($kriterias, $alternatifs);
        $matriksR = $this->normalizeMatriks($matriksX);
        $matriksRb = $this->weightedNormalizeMatriks($matriksR, $kriterias);
        $nilaiYi = $this->calculateYi($matriksRb, $alternatifs);

        // Mengembalikan tampilan dengan data yang relevan
        return view('perhitungan', compact('kriterias', 'alternatifs', 'matriksX', 'matriksR', 'matriksRb', 'nilaiYi'));
    }

    private function calculateMatriksX($kriterias, $alternatifs)
    {
        $matriksX = [];
        foreach ($kriterias as $kriteria) {
            foreach ($alternatifs as $alternatif) {
                // Mendapatkan penilaian dengan parameter yang valid
                $nilai = $this->perhitunganModel->getPenilaian(
                    $alternatif['id_alternatif'],
                    $kriteria['id_kriteria']
                );

                // Periksa jika nilai tidak kosong
                if ($nilai) {
                    $matriksX[$kriteria['id_kriteria']][$alternatif['id_alternatif']] = $nilai['nilai']; // Ambil nilai dari hasil query
                } else {
                    $matriksX[$kriteria['id_kriteria']][$alternatif['id_alternatif']] = 0; // Atur default jika tidak ada
                }
            }
        }
        return $matriksX;
    }

    private function normalizeMatriks($matriksX)
    {
        $matriksR = [];
        foreach ($matriksX as $idKriteria => $penilaians) {
            $sumSquares = array_sum(array_map(fn($v) => $v ** 2, $penilaians));
            $sqrtSum = sqrt($sumSquares);

            foreach ($penilaians as $idAlternatif => $nilai) {
                $matriksR[$idKriteria][$idAlternatif] = $sqrtSum != 0 ? $nilai / $sqrtSum : 0; // Tambahkan pengecekan untuk menghindari pembagian dengan nol
            }
        }
        return $matriksR;
    }

    private function weightedNormalizeMatriks($matriksR, $kriterias)
    {
        $matriksRb = [];
        foreach ($kriterias as $kriteria) {
            // Pastikan $matriksR memiliki entri untuk kriteria saat ini
            if (isset($matriksR[$kriteria['id_kriteria']])) {
                foreach ($matriksR[$kriteria['id_kriteria']] as $idAlternatif => $nilaiR) {
                    $matriksRb[$kriteria['id_kriteria']][$idAlternatif] = $nilaiR * $kriteria['bobot'];
                }
            }
        }
        return $matriksRb;
    }

    private function calculateYi($matriksRb, $alternatifs)
    {
        $nilaiYi = [];
        foreach ($alternatifs as $alternatif) {
            $totalMax = 0;
            foreach ($matriksRb as $idKriteria => $nilaiAlternatif) {
                if (isset($nilaiAlternatif[$alternatif['id_alternatif']])) {
                    $totalMax += $nilaiAlternatif[$alternatif['id_alternatif']];
                }
            }
            $yi = $totalMax;
            $this->perhitunganModel->insertHasil($alternatif['id_alternatif'], $yi);
            $nilaiYi[$alternatif['id_alternatif']] = $yi;
        }
        return $nilaiYi;
    }
}
