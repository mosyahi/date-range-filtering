<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblSiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nis' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->forge->addKey('nis', true);
        $this->forge->createTable('tbl_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_siswa');
    }
}
