<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('questions')->delete();
        
        \DB::table('questions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Smoke?',
                'question' => NULL,
                'with_answer' => 0,
                'is_doyou' => 1,
                'is_active' => 1,
                'created_at' => '2023-01-29 11:16:23',
                'updated_at' => '2023-01-29 11:16:23',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Drink alcoholic drinks?',
                'question' => NULL,
                'with_answer' => 0,
                'is_doyou' => 1,
                'is_active' => 1,
                'created_at' => '2023-01-29 11:16:23',
                'updated_at' => '2023-01-29 11:16:23',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Have problem falling asleep?',
                'question' => NULL,
                'with_answer' => 0,
                'is_doyou' => 1,
                'is_active' => 1,
                'created_at' => '2023-01-29 11:17:15',
                'updated_at' => '2023-01-29 11:17:15',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Have memory lapses?',
                'question' => NULL,
                'with_answer' => 0,
                'is_doyou' => 1,
                'is_active' => 1,
                'created_at' => '2023-01-29 11:17:15',
                'updated_at' => '2023-01-29 11:17:15',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Take any medications?',
                'question' => 'If yes, please specify the medication and for what condition.',
                'with_answer' => 1,
                'is_doyou' => 1,
                'is_active' => 1,
                'created_at' => '2023-01-29 11:18:05',
                'updated_at' => '2023-01-29 11:18:05',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Been hospitalized for any reason?',
                'question' => 'If yes, please specify for what reason and current status.',
                'with_answer' => 1,
                'is_doyou' => 0,
                'is_active' => 1,
                'created_at' => '2023-01-29 11:18:28',
                'updated_at' => '2023-01-29 11:18:28',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Undergone surgery?',
                'question' => NULL,
                'with_answer' => 0,
                'is_doyou' => 0,
                'is_active' => 1,
                'created_at' => '2023-01-29 11:18:28',
                'updated_at' => '2023-01-29 11:18:28',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Been diagnosed with any chronic medical condition?',
                'question' => NULL,
                'with_answer' => 0,
                'is_doyou' => 0,
                'is_active' => 1,
                'created_at' => '2023-01-29 11:22:17',
                'updated_at' => '2023-01-29 11:22:17',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Undergone psychiatric assessment or treatment',
                'question' => 'If yes, please specify diagnosis, management and current status.
',
                'with_answer' => 1,
                'is_doyou' => 0,
                'is_active' => 1,
                'created_at' => '2023-01-29 11:23:04',
                'updated_at' => '2023-01-29 11:23:04',
            ),
        ));
        
        
    }
}