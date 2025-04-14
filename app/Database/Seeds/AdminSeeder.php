<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $password = password_hash('admin123', PASSWORD_DEFAULT);

        $data = [
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => $password,
            'role'     => 'admin',
        ];

        $this->db->table('users')->insert($data);
    }
}
