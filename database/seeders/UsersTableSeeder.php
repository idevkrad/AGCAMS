<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'administrator',
                'email' => 'admin@dost.com',
                'email_verified_at' => '2023-01-27 19:26:22',
                'password' => '$2y$10$EnkHwh3s9FXarPnDYm8g3u/H9A3jbmMAQuZOwoJQChcnxU72a4jDa',
                'avatar' => 'avatar.jpg',
                'role' => 'Super Administrator',
                'is_active' => 1,
                'welcome_valid_until' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-01-27 19:26:22',
                'updated_at' => '2023-01-27 19:26:22',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => '12000',
                'email' => 'tiong@yahoo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$utqa0/0vXpRwi1tAW40rCOj4MyK/2SZXvwRScCmQ4LBxR9BJPEjYq',
                'avatar' => 'avatar.jpg',
                'role' => 'Staff',
                'is_active' => 0,
                'welcome_valid_until' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-01-27 19:29:17',
                'updated_at' => '2023-01-27 19:29:17',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => '12001',
                'email' => 'Belcina@yahoo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$7ls2Mvz9ot/ZAQVKu5Y9seXbOT94kFwNN5URshckwVTK8BC5AZZkq',
                'avatar' => 'avatar.jpg',
                'role' => 'Staff',
                'is_active' => 0,
                'welcome_valid_until' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-01-27 19:36:43',
                'updated_at' => '2023-01-27 19:36:43',
            ),
            3 => 
            array (
                'id' => 4,
                'username' => '12002',
                'email' => 'faustino@yahoo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$nH9nZUzKv8Uv4dDJoc9z8.nwyR6nLSQjXPppfW63I6wOlzgJ8JjIG',
                'avatar' => 'avatar.jpg',
                'role' => 'Staff',
                'is_active' => 0,
                'welcome_valid_until' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-01-27 19:37:35',
                'updated_at' => '2023-01-27 19:37:35',
            ),
            4 => 
            array (
                'id' => 5,
                'username' => '12003',
                'email' => 'abella@yahoo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HkgMA2JaBlCwze0xclaTU.vFR.fea.cN89pgoTX9QzxdCGCrzJcoG',
                'avatar' => 'avatar.jpg',
                'role' => 'Staff',
                'is_active' => 0,
                'welcome_valid_until' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-01-27 19:38:13',
                'updated_at' => '2023-01-27 19:38:13',
            ),
            5 => 
            array (
                'id' => 6,
                'username' => '12004',
                'email' => 'narvasa@yahoo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$qvkiLRwRlPlq98gnLiFGb.HJT9hAsaOsQvYQCQ.s/zxuhL.5YVsRK',
                'avatar' => 'avatar.jpg',
                'role' => 'Staff',
                'is_active' => 0,
                'welcome_valid_until' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-01-27 19:39:18',
                'updated_at' => '2023-01-27 19:39:18',
            ),
        ));
        
        
    }
}