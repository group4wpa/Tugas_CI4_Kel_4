<?php

// Model FieldModel.php
namespace App\Models;

use CodeIgniter\Model;

class FieldModel extends Model
{
    protected $table = 'fields';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'sport', 'image']; // pastikan 'image' ada di sini
}
