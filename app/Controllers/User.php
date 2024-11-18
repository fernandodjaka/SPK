<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class User extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->where('deleted_at', null)->findAll(); // Only show users not soft-deleted
        return view('list_user', $data);
    }

    public function create()
    {
        return view('tambah_user');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[16]|is_unique[user.username]',
            'password' => 'required',
            'nama'     => 'required|max_length[70]',
            'email'    => 'required|valid_email|max_length[50]|is_unique[user.email]',
            'role'     => 'required|exact_length[1]',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'nama'     => $this->request->getPost('nama'),
                'email'    => $this->request->getPost('email'),
                'role'     => $this->request->getPost('role'),
            ];

            $this->userModel->insert($data);
            return redirect()->to('/user')->with('success', 'User successfully added.');
        }

        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('edit_user', $data);
    }

    public function update($id)
    {
        $existingUser = $this->userModel->find($id);

        $validationRules = [
            'username' => 'required|min_length[3]|max_length[16]',
            'nama'     => 'required|max_length[70]',
            'email'    => 'required|valid_email|max_length[50]',
            'role'     => 'required|exact_length[1]',
        ];

        if ($this->request->getPost('username') !== $existingUser['username']) {
            $validationRules['username'] .= '|is_unique[user.username]';
        }
        if ($this->request->getPost('email') !== $existingUser['email']) {
            $validationRules['email'] .= '|is_unique[user.email]';
        }

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->userModel->update($id, [
            'username' => $this->request->getPost('username'),
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role'),
        ]);

        return redirect()->to('/user')->with('success', 'User successfully updated.');
    }

    public function delete($id)
    {
        if ($this->userModel->update($id, ['deleted_at' => date('Y-m-d H:i:s')])) {
            return redirect()->to('/user')->with('success', 'User successfully deleted.');
        }

        return redirect()->back()->with('error', 'Failed to delete user.');
    }
}
