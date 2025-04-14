<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'nama', 'olahraga', 'lapangan_id', 'tanggal', 'jam', 'harga', 'status'];
}
