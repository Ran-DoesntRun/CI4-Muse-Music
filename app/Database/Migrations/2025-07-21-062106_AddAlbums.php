<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAlbums extends Migration
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
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tgl_rilis' => [
                'type' => 'DATE',
            ],
            'img' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'id_artists' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('albums');
    }

    public function down()
    {
        $this->forge->dropTable('albums');
    }
}
