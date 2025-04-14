<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Olahraga extends BaseController
{
    public function pemesanan()
    {
        return view('user/pemesanan');
    }
}
