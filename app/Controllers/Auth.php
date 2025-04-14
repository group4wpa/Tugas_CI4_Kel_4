<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function showRegisterForm()
    {
        return view('auth/register'); // Pastikan file ini ada di app/Views/auth/register.php
    }

    public function registerAction()
    {
        $userModel = new UserModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'     => 'required',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$this->validate($validation->getRules())) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/register')->withInput();
        }

        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'user', // Set default role jika tidak ada input role
        ];

        $userModel->insert($data);
        session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');

        return redirect()->to('/login');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/register')->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();
        $userModel->insert([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function login()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Simpan user_id dan role di session
            session()->set([
                'user_id'   => $user['id'],
                'role'      => $user['role'], // Simpan role dari database
                'logged_in' => true
            ]);

            // Redirect berdasarkan peran (admin ke dashboard, user ke halaman utama)
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/login')->with('error', 'Email atau password salah');
        }
    }



    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logout berhasil.');
    }
}
