<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'tbl_siswa';
    protected $primaryKey       = 'nis';
    protected $allowedFields    = ['nis', 'nama', 'alamat'];
}
