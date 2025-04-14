<?php

namespace App\Controllers;

use App\Models\PemesananModel;

class Admin extends BaseController
{
    protected $pemesananModel;

    public function __construct()
    {
        $this->pemesananModel = new PemesananModel();
    }

    public function dashboard()
    {
        $userModel = new \App\Models\UserModel();

        $data = [
            'title' => 'Dashboard Admin',
            'total_pemesanan' => $this->pemesananModel->countAll(),
            'total_pemasukan' => $this->pemesananModel->selectSum('harga')->first()['harga'] ?? 0,
            'pemesanan_hari_ini' => $this->pemesananModel->where('tanggal', date('Y-m-d'))->countAllResults(),
            'jumlah_pelanggan' => $userModel->where('role', 'user')->countAllResults()
        ];

        return view('admin/dashboard', $data);
    }


    public function dataPelanggan()
    {
        $userModel = new \App\Models\UserModel();
        $profileModel = new \App\Models\ProfileModel();

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $users = $userModel->where('role', 'user')
                ->like('name', $keyword)
                ->orLike('email', $keyword)
                ->findAll();
        } else {
            $users = $userModel->where('role', 'user')->findAll();
        }

        foreach ($users as &$u) {
            $profile = $profileModel->where('user_id', $u['id'])->first();
            if ($profile) {
                $u['phone'] = $profile['phone'] ?? '-';
                $u['address'] = $profile['address'] ?? '-';
            }
        }

        return view('admin/data_pelanggan/index', [
            'pelanggan' => $users,
            'keyword' => $keyword
        ]);
    }




    public function pemesanan()
    {
        $pemesananModel = new \App\Models\PemesananModel();
        $data['pemesanan'] = $pemesananModel
            ->join('lapangan', 'lapangan.id = pemesanan.lapangan_id')
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        return view('admin/pemesanan', $data);
    }


    public function hapus($id)
    {
        $this->pemesananModel->delete($id);
        return redirect()->to('/admin/pemesanan')->with('success', 'Pemesanan berhasil dihapus.');
    }

    public function approve($id)
    {
        $pemesananModel = new \App\Models\PemesananModel();
        $pemesananModel->update($id, ['status' => 'approved']);

        return redirect()->back()->with('success', 'Pemesanan disetujui!');
    }
}
