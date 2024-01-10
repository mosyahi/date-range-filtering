<?php

namespace App\Models;

use CodeIgniter\Model;

class MatpelModel extends Model
{
    protected $table            = 'tbl_matpel';
    protected $primaryKey       = 'id_matpel';
    protected $allowedFields    = ['nama_matpel'];
}
