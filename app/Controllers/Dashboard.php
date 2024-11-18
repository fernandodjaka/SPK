<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function admin()
    {
        // Ensure only admins can access this page
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'A') {
            return redirect()->to('/login')->with('error', 'Access denied. Admins only.');
        }

        // Data to be passed to the view
        $data = [
            'page' => 'Dashboard',
            'title' => 'Admin Dashboard'
        ];

        return view('dashboard_admin', $data);
    }

    public function user()
    {
        // Ensure only regular users can access this page
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'B') {
            return redirect()->to('/login')->with('error', 'Access denied. Users only.');
        }

        // Data to be passed to the view
        $data = [
            'page' => 'Dashboard',
            'title' => 'User Dashboard'
        ];

        return view('dashboard_user', $data);
    }
}
