<?php

namespace App\Controllers;

class Order extends BaseController
{
    public function form($jenis)
    {
        // Kamu bisa sesuaikan logic sesuai kebutuhan
        return view('user/pesan_lapangan', ['jenis' => $jenis]);
    }
}
