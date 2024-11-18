<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'nama', 'email', 'role', 'deleted_at'];

    // Menambahkan pengaturan untuk soft deletes
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    // Menyesuaikan panjang maksimal berdasarkan struktur tabel
    protected $validationRules = [
        'username' => 'required|max_length[16]|is_unique[user.username]',
        'password' => 'required|max_length[50]',
        'nama' => 'required|max_length[70]',
        'email' => 'required|valid_email|max_length[50]|is_unique[user.email]',
        'role' => 'required|exact_length[1]',
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username harus diisi.',
            'max_length' => 'Username tidak boleh lebih dari 16 karakter.',
            'is_unique' => 'Username sudah terdaftar.',
        ],
        'password' => [
            'required' => 'Password harus diisi.',
            'max_length' => 'Password tidak boleh lebih dari 50 karakter.',
        ],
        'nama' => [
            'required' => 'Nama harus diisi.',
            'max_length' => 'Nama tidak boleh lebih dari 70 karakter.',
        ],
        'email' => [
            'required' => 'Email harus diisi.',
            'valid_email' => 'Email tidak valid.',
            'max_length' => 'Email tidak boleh lebih dari 50 karakter.',
            'is_unique' => 'Email sudah terdaftar.',
        ],
        'role' => [
            'required' => 'Role harus diisi.',
            'exact_length' => 'Role hanya boleh 1 karakter.',
        ],
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;
}
