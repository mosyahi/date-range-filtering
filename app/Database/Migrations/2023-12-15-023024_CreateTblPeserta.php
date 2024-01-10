<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblPeserta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peserta' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'id_ujian' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'peserta' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addPrimaryKey('id_peserta');
        $this->forge->createTable('tbl_peserta');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_peserta');
    }
}
