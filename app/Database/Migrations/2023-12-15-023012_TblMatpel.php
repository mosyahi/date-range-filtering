<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblMatpel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_matpel' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'nama_matpel' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);

        $this->forge->addPrimaryKey('id_matpel');
        $this->forge->createTable('tbl_matpel');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_matpel');
    }
}
