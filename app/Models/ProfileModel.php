<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table      = 'profiles'; // Sesuaikan dengan nama tabel
    protected $primaryKey = 'id'; // Sesuaikan dengan primary key
    protected $allowedFields = ['user_id', 'bio', 'phone', 'address', 'avatar']; // Pastikan kolom yang boleh di-update
}
