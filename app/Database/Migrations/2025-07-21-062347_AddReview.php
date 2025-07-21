<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddReview extends Migration
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
            'comment' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'rating' => [
                'type'       => 'FLOAT',
                'constraint' => '3,2',
                'null'       => false,
            ],
            'id_user' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'id_songs' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('review');
    }

    public function down()
    {
         $this->forge->dropTable('review');
    }
}
