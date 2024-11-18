<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\PenilaianModel; // Pastikan Anda menambahkan model untuk penilaian
use CodeIgniter\Exceptions\PageNotFoundException;

class Alternatif extends BaseController
{
    protected $alternatifModel;
    protected $penilaianModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->alternatifModel = new AlternatifModel();
        $this->penilaianModel = new PenilaianModel();
    }

    // Method untuk menampilkan daftar alternatif
    public function index()
    {
        // Ambil data dari model
        $data['alternatifs'] = $this->alternatifModel->findAll();

        // Load view list alternatif
        return view('list_alternatif', $data);
    }

    // Method untuk menampilkan form tambah alternatif
    public function tambahView()
    {
        // Load form tambah alternatif
        return view('tambah_alternatif');
    }

    // Method untuk menambah alternatif ke database
    public function tambah()
    {
        // Cek jika user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Lakukan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'jk'   => 'required'
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();

        // Jika data valid, simpan ke database
        if ($isDataValid) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'jk'   => $this->request->getPost('jk')
            ];

            // Simpan data ke database
            $this->alternatifModel->insert($data);

            return redirect()->to('/list-alternatif')->with('success', 'Data alternatif berhasil ditambahkan.');
        }

        // Tampilkan form tambah alternatif jika validasi gagal
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Method untuk menampilkan form edit alternatif
    public function edit($id)
    {
        // Ambil data alternatif berdasarkan id
        $data['alternatif'] = $this->alternatifModel->find($id);

        // Jika data tidak ditemukan, kembalikan error 404
        if (empty($data['alternatif'])) {
            throw new PageNotFoundException('Alternatif tidak ditemukan');
        }

        // Load view edit alternatif
        return view('edit_alternatif', $data);
    }

    // Method untuk mengupdate data alternatif di database
    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'jk'   => 'required'
        ]);

        // Jika validasi gagal
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Siapkan data untuk update
        $data = [
            'id_alternatif' => $id,
            'nama'          => $this->request->getPost('nama'),
            'jk'            => $this->request->getPost('jk')
        ];

        // Update data di database
        if ($this->alternatifModel->save($data)) {
            return redirect()->to('/list-alternatif')->with('success', 'Data alternatif berhasil diupdate.');
        } else {
            return redirect()->back()->with('errors', 'Gagal mengupdate data.');
        }
    }

    // Method untuk menghapus data alternatif
    public function hapus($id)
    {
        // Hapus penilaian terkait dengan alternatif ini terlebih dahulu
        $this->penilaianModel->where('id_alternatif', $id)->delete();

        // Hapus data alternatif dari database
        if ($this->alternatifModel->delete($id)) {
            return redirect()->to('/list-alternatif')->with('success', 'Data alternatif dan penilaian yang terkait berhasil dihapus.');
        } else {
            return redirect()->back()->with('errors', 'Gagal menghapus data.');
        }
    }
}
