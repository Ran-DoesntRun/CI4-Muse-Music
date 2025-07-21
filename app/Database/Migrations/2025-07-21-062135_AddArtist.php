<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddArtist extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'member' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'default'    => null,
            ],
            'debut' => [
                'type' => 'DATE',
            ],
            'img' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'bio' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('artists');
    }

    public function down()
    {
        $this->forge->dropTable('artists');
    }
}
