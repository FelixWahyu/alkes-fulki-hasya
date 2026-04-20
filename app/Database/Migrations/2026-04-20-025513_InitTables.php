<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitTables extends Migration
{
    public function up()
    {
        // Table: admins
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'email'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admins');

        // Table: categories
        $this->forge->addField([
            'id'   => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categories');

        // Table: products
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'category_id'   => ['type' => 'INT', 'constraint' => 11],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 200],
            'slug'          => ['type' => 'VARCHAR', 'constraint' => 200],
            'description'   => ['type' => 'TEXT', 'null' => true],
            'specification' => ['type' => 'TEXT', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');

        // Table: product_images
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'product_id' => ['type' => 'INT', 'constraint' => 11],
            'image'      => ['type' => 'VARCHAR', 'constraint' => 255],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('product_images');

        // Table: settings (CMS)
        $this->forge->addField([
            'id'    => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'key'   => ['type' => 'VARCHAR', 'constraint' => 100],
            'value' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings');

        // Table: leads (BONUS)
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'product_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'customer_name'=> ['type' => 'VARCHAR', 'constraint' => 150],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 20],
            'address'      => ['type' => 'TEXT'],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('leads');
    }

    public function down()
    {
        $this->forge->dropTable('leads');
        $this->forge->dropTable('settings');
        $this->forge->dropTable('product_images');
        $this->forge->dropTable('products');
        $this->forge->dropTable('categories');
        $this->forge->dropTable('admins');
    }
}