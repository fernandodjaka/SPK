<?php namespace App\Controllers;

use App\Models\KriteriaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Kriteria extends BaseController
{
    public function index()
    {
        $model = new KriteriaModel();
        $data['kriteria'] = $model->findAll(); // Ambil semua data kriteria
        echo view('list_kriteria', $data); // Load view dan kirim data kriteria
    }

    //--------------------------------------------------------------------------

    public function tambahKriteria()
    {
        // Cek jika user sudah login dan perannya admin
        if (!session()->get('isLoggedIn') || session()->get('role') != 'A') {
            return redirect()->to('/login');
        }

        // Lakukan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_kriteria' => 'required|max_length[10]',
            'nama' => 'required|max_length[50]',
            'type' => 'required|in_list[benefit,cost]',
            'bobot' => 'required|numeric'
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();

        // Jika data valid, simpan ke database
        if ($isDataValid) {
            $model = new KriteriaModel();
            $model->insert([
                'kode_kriteria' => $this->request->getPost('kode_kriteria'),
                'nama' => $this->request->getPost('nama'),
                'type' => $this->request->getPost('type'),
                'bobot' => $this->request->getPost('bobot'),
            ]);
            return redirect()->to('/list-kriteria')->with('success', 'Data berhasil ditambahkan');
        }

        // Tampilkan form tambah kriteria
        echo view('tambah_kriteria', [
            'validation' => $validation // Kirim validasi untuk ditampilkan di view
        ]);
    }

    //--------------------------------------------------------------------------

    public function editKriteria($id)
    {
        $model = new KriteriaModel();
        $data['kriteria'] = $model->where('id_kriteria', $id)->first();

        if (!$data['kriteria']) {
            throw PageNotFoundException::forPageNotFound();
        }

        // Lakukan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_kriteria' => 'required|max_length[10]',
            'nama' => 'required|max_length[50]',
            'type' => 'required|in_list[benefit,cost]',
            'bobot' => 'required|numeric'
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();

        // Jika data valid, simpan ke database
        if ($isDataValid) {
            $model->update($id, [
                'kode_kriteria' => $this->request->getPost('kode_kriteria'),
                'nama' => $this->request->getPost('nama'),
                'type' => $this->request->getPost('type'),
                'bobot' => $this->request->getPost('bobot'),
            ]);
            return redirect()->to('/list-kriteria')->with('success', 'Data berhasil diupdate');
        }

        // Tampilkan form edit kriteria
        echo view('edit_kriteria', $data);
    }

    //--------------------------------------------------------------------------

    public function hapusKriteria($id)
    {
        $model = new KriteriaModel();
        $model->delete($id);
        return redirect()->to('/list-kriteria')->with('success', 'Data berhasil dihapus');
    }
}
