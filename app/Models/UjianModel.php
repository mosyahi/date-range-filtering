<?php

namespace App\Models;

use CodeIgniter\Model;

class UjianModel extends Model
{
    protected $table            = 'tbl_ujian';
    protected $primaryKey       = 'id_ujian';
    protected $allowedFields    = ['nama_ujian', 'id_matpel', 'tanggal'];

    public function getUjianByDateRange($start_date, $end_date)
    {
        return $this->where('tanggal >=', $start_date)
        ->where('tanggal <=', $end_date)
        ->findAll();
    }
}
