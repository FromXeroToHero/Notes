<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNotes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    =>  [
                'type'      =>      'INT',
                'constraint'=>      5,
                'unsigned'  =>      true,
                'auto_increment'=>  true,
            ],
            'user_id'   =>  [
                'type'      =>      'INT',
            ],
            'title'     =>  [
                'type'      =>      'VARCHAR',
                'constraint'=>      '80',
            ],
            'text'     =>  [
                'type'      =>      'VARCHAR',
                'constraint'=>      '1000',
            ],
            'image'     =>  [
                'type'      =>      'VARCHAR',
                'constraint'=>      '100',
            ],
            'created_date datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        
    }

    public function down()
    {
        $this->forge->dropTable('notes');
    }
}
