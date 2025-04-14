<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProfileModel; // Tambahkan model Profile jika avatar ada di tabel profile

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login', [
            'validation' => \Config\Services::validation()
        ]);
    }

    public function login_action()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('auth/login', [
                'validation' => $this->validator
            ]);
        }

        $session   = session();
        $userModel = new UserModel();
        $email     = $this->request->getVar('email');
        $password  = $this->request->getVar('password');
        $user      = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Ambil avatar dari tabel ProfileModel
            $profileModel = new ProfileModel();
            $profile      = $profileModel->where('user_id', $user['id'])->first();
            $avatar       = $profile ? $profile['avatar'] : 'uploads/avatars/default.png';

            // Simpan data ke session
            $session->set([
                'id_user'   => $user['id'],
                'username'  => $user['email'],
                'avatar'    => $avatar, // Simpan avatar ke session
                'logged_in' => true,
                'role_id'   => $user['role']
            ]);

            return match (strtolower($user['role'])) {
                'admin' => redirect()->to('/admin/dashboard'),
                'user'  => redirect()->to('/user/dashboard'),
                default => redirect()->to('/')->with('error', 'Akun Anda belum terdaftar!')
            };
        } else {
            return redirect()->to('/login')->with('error', 'Email atau password salah!');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login'); // Arahkan ke /login, bukan /user/login
    }
}
