<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddClass extends Migration
{    public function up()
    {
        // Check if the table already exists
        if ($this->db->tableExists('weather_project')) {
            echo 'The table "weather_project" already exists. Skipping creation.' . PHP_EOL;
            return;
        }

        // Table does not exist, proceed with creation
        $this->forge->addField([
            'City' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'Country' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false
            ],
            'Temperature' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'Humidity' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'Wind_gust' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'Precipitation' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false         
            ],
            'Latitude' => [
                'type' => 'FLOAT',
                'null' => false
            ],
            'Longitude' => [
                'type' => 'FLOAT',
                'null' => false
            ], 
        ]);
        $this->forge->addPrimaryKey('City');
        $this->forge->createTable('weather_project');
    }

    public function down()
    {
        $this->forge->dropTable('weather_project');
    }
}
