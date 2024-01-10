<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblUjian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ujian' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'id_matpel' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'nama_ujian' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'tanggal' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('id_ujian');
        $this->forge->createTable('tbl_ujian');
    }


    public function down()
    {
        $this->forge->dropTable('tbl_ujian');
    }
}
