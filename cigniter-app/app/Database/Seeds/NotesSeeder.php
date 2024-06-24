<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
class NotesSeeder extends Seeder
{
    public function run()
    {

        for ($i = 0; $i < 5; $i++) {
            $this->db->table('notes')->insert($this->generateRecords());
        }
    }

    private function generateRecords(): array {
        $faker = Factory::create();
        return [
            'title' => $faker->name,
            'text' => $faker->sentence(20),
            'user_id' => 2,
        ];
    }
}
