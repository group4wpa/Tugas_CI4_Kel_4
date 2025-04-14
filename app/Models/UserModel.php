<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Pastikan ini sesuai dengan tabel di database
    protected $primaryKey = 'id'; // Pastikan ini sesuai dengan primary key di database
    protected $allowedFields = ['name', 'email', 'password', 'role']; // Tambahkan role jika ada
}
