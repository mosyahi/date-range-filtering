<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
   protected $table            = 'tbl_peserta';
   protected $primaryKey       = 'id_peserta';
   protected $allowedFields    = ['id_ujian', 'peserta', 'keterangan'];
}
