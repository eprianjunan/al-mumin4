<?php

namespace App\Models;

use CodeIgniter\Model;

class TenagaAdministrasiModel extends Model
{
    protected $allowedFields = ['id_tenagaadministrasi', 'nama', 'bagian'];
    protected $table = 'tenagaadministrasi';
    protected $primaryKey = 'id_tenagaadministrasi';
}