<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfileModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $profileModel = new ProfileModel();

        $user = $userModel->find($userId);
        $profile = $profileModel->where('user_id', $userId)->first();

        // Jika avatar tidak ada, gunakan default
        if (!$profile || empty($profile['avatar'])) {
            $profile['avatar'] = 'uploads/avatars/default.png';
        }

        return view('user/profile', ['user' => $user, 'profile' => $profile]);
    }



    public function update()
    {
        $profileModel = new ProfileModel();
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil data input
        $data = [
            'bio' => $this->request->getPost('bio'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ];

        // Cek apakah pengguna memiliki profil
        $profile = $profileModel->where('user_id', $userId)->first();

        // Upload foto profil jika ada
        $avatar = $this->request->getFile('avatar');
        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            // Hapus avatar lama jika ada
            if ($profile && !empty($profile['avatar']) && file_exists($profile['avatar'])) {
                unlink($profile['avatar']);
            }

            $newName = $avatar->getRandomName();
            $avatar->move('uploads/avatars', $newName);

            $data['avatar'] = 'uploads/avatars/' . $newName;

            // Perbarui session agar foto di navbar dan profil ikut berubah
            session()->set('avatar', $data['avatar']);
        }

        if ($profile) {
            $update = $profileModel->where('user_id', $userId)->set($data)->update();
            if (!$update) {
                return redirect()->to('/profile')->with('error', 'Gagal memperbarui profil.');
            }
        } else {
            $data['user_id'] = $userId;
            $insert = $profileModel->insert($data);
            if (!$insert) {
                return redirect()->to('/profile')->with('error', 'Gagal menambahkan profil.');
            }
        }
        // Simpan ulang data profil ke session
        $updatedProfile = $profileModel->where('user_id', $userId)->first();
        session()->set('profile', $updatedProfile);

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
