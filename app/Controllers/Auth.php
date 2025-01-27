<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Halaman login
    public function login()
    {
        // Redirect jika sudah login
        if (session()->get('isLoggedIn')) {
            return session()->get('role') === 'admin'
                ? redirect()->to('/dashboard')
                : redirect()->to('/gamelibrary');
        }

        return view('auth/login');
    }

    // Proses login
    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        // Ambil data user berdasarkan username
        $user = $this->userModel->getUser($username);

        if ($user) {
            // Debug log untuk melihat data
            log_message('debug', 'Password input: ' . $password);
            log_message('debug', 'Password hash from DB: ' . $user['password']);

            // Verifikasi password dan role
            if (password_verify($password, $user['password'])) {
                if ($user['role'] === $role) {
                    session()->set([
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'isLoggedIn' => true,
                    ]);

                    // Redirect berdasarkan role
                    return $role === 'admin'
                        ? redirect()->to('/dashboard')
                        : redirect()->to('/user'); // Ubah redirect user ke '/user'
                } else {
                    return redirect()->back()->withInput()->with('error', 'Role tidak sesuai.');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username tidak ditemukan.');
        }
    }

    // Halaman register
    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(session()->get('role') === 'admin' ? '/dashboard' : '/gamelibrary');
        }

        return view('auth/register');
    }

    // Proses register
    public function processRegister()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[30]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'role'     => 'required|in_list[admin,user]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Hash password dan simpan ke database
        $password = $this->request->getPost('password');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Debug log untuk memastikan password di-hash
        log_message('debug', 'Password: ' . $password);
        log_message('debug', 'Hashed Password: ' . $hashedPassword);

        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => $hashedPassword,
            'role'     => $this->request->getPost('role'),
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
