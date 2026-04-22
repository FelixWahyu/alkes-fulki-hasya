<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePartnershipsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'company_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'email'        => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone'        => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'message'      => [
                'type' => 'TEXT',
            ],
            'status'       => [
                'type'       => 'ENUM',
                'constraint' => ['new', 'read', 'archived'],
                'default'    => 'new',
            ],
            'created_at'   => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'   => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('partnerships');
    }

    public function down()
    {
        $this->forge->dropTable('partnerships');
    }
}
