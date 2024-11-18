<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validate input
        if (!$username || !$password) {
            $session->setFlashdata('error', 'Username dan password tidak boleh kosong');
            return redirect()->back()->withInput();
        }

        // Fetch user by username
        $user = $model->where('username', $username)->first();

        if ($user) {
            // Directly compare password without hashing
            if ($password === $user['password']) {
                // Set session data
                $session->set([
                    'user_id'   => $user['id_user'],
                    'username'  => $user['username'],
                    'nama'      => $user['nama'],
                    'email'     => $user['email'],
                    'role'      => $user['role'], // 'A' for admin, 'B' for user
                    'isLoggedIn'=> true
                ]);

                // Debugging: Check if session values are set
                log_message('info', 'User logged in with role: ' . $session->get('role'));

                // Redirect based on role
                if ($user['role'] === 'A') {
                    return redirect()->to('/dashboard_admin');
                } else {
                    return redirect()->to('/dashboard_user');
                }
            } else {
                $session->setFlashdata('error', 'Password salah');
                return redirect()->back()->withInput();
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
