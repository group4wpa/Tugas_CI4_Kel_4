<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FieldModel;
use App\Models\JadwalModel;
use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Models\LapanganModel;
use App\Models\PemesananModel;

class User extends BaseController
{
    public function dashboard()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('user/dashboard');
    }

    public function profile()
    {
        // Pastikan session dimuat dan id_user tersedia
        $userId = session()->get('id_user');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Inisialisasi model
        $userModel = new UserModel();
        $profileModel = new ProfileModel();

        // Ambil data pengguna dari database
        $user = $userModel->find($userId);
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Akun tidak ditemukan, silakan login kembali.');
        }

        // Ambil data profil pengguna
        $profile = $profileModel->where('user_id', $userId)->first();

        // Jika profil tidak ditemukan, inisialisasi data default
        if (!$profile) {
            $profile = [
                'user_id' => $userId,
                'avatar' => 'uploads/avatars/default.png',
                'full_name' => $user['username'] ?? 'Pengguna', // Gantilah sesuai kolom di database
                'bio' => '',
                'phone' => '',
                'address' => '',
            ];
        } else {
            // Pastikan avatar tidak kosong
            if (empty($profile['avatar'])) {
                $profile['avatar'] = 'uploads/avatars/default.png';
            }
        }

        return view('user/profile', [
            'user' => $user,
            'profile' => $profile
        ]);
    }


    public function update()
    {

        $userId = session()->get('id_user'); // Pastikan id_user sesuai dengan session login
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $profileModel = new ProfileModel();

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
                return redirect()->to('/user/profile')->with('error', 'Gagal memperbarui profil.');
            }
        } else {
            $data['user_id'] = $userId;
            $insert = $profileModel->insert($data);
            if (!$insert) {
                return redirect()->to('/user/profile')->with('error', 'Gagal menambahkan profil.');
            }
        }

        // Perbarui session setelah update agar data sidebar ikut berubah
        $updatedProfile = $profileModel->where('user_id', $userId)->first();
        session()->set('profile', $updatedProfile);
        session()->set('avatar', $updatedProfile['avatar'] ?? 'uploads/avatars/default.png');


        return redirect()->to('/user/profile')->with('success', 'Profil berhasil diperbarui!');
    }

    // Halaman Pemesanan Lapangan
    public function pemesanan()
    {
        $db = \Config\Database::connect();

        // UBAH 'nama_lapangan' → 'nama' jika itu nama kolom yang benar di tabelmu
        $lapangan = $db->table('lapangan')
            ->select('id, nama, sport, harga')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();


        return view('user/pemesanan', ['lapangan' => $lapangan]);
    }



    // Menampilkan jadwal berdasarkan lapangan yang dipilih
    public function getJadwalLapangan()
    {
        $lapanganId = $this->request->getPost('lapangan_id');
        $jadwalModel = new JadwalModel();

        // Ambil jadwal berdasarkan lapangan yang dipilih
        $jadwal = $jadwalModel->where('lapangan_id', $lapanganId)->findAll();

        return $this->response->setJSON($jadwal); // Mengembalikan data jadwal dalam format JSON
    }

    // Menyimpan Pemesanan Lapangan
    public function simpanPemesanan()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $lapanganId = $this->request->getPost('lapangan_id');
        $time = $this->request->getPost('time');

        // Ambil data lapangan
        $db = \Config\Database::connect();
        $lapangan = $db->table('lapangan')->where('id', $lapanganId)->get()->getRow();

        if (!$lapangan) {
            return redirect()->to('/user/pemesanan')->with('error', 'Lapangan tidak ditemukan!');
        }

        // Hitung harga otomatis berdasarkan jam
        $harga = 0;
        if ($time == "06:00 - 10:00") {
            $harga = $lapangan->harga_pagi ?? 0;
        } elseif ($time == "13:00 - 17:00") {
            $harga = $lapangan->harga_siang ?? 0;
        } elseif ($time == "18:00 - 23:00") {
            $harga = $lapangan->harga_malam ?? 0;
        }

        // Data yang akan disimpan
        $data = [
            'user_id'     => session()->get('id_user'),
            'nama'        => session()->get('username'),
            'olahraga'    => $this->request->getPost('sport'),
            'lapangan_id' => $lapanganId,
            'tanggal'     => $this->request->getPost('date'),
            'jam'         => $time,
            'harga'       => $harga,
            'status'      => 'pending'
        ];

        // Simpan ke database
        $pemesananModel = new \App\Models\PemesananModel();
        $pemesananModel->insert($data);

        return redirect()->to('/user/history')->with('success', 'Pemesanan berhasil dilakukan dan menunggu persetujuan admin.');
    }


    // Riwayat Pemesanan
    public function history()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $pemesananModel = new \App\Models\PemesananModel();
        $userId = session()->get('id_user');

        $data['pemesanan'] = $pemesananModel->where('user_id', $userId)->findAll();

        return view('user/history', $data);
    }
}
