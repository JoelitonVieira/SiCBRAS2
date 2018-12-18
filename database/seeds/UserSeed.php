<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'matricula' => '23456', 'password' => '$2y$10$.X3J0wXMhx6HizH5TA0g8eSL3W0XH4rTrHyxBfzx0hs9.7KwcY93O', 'role_id' => 1, 'remember_token' => '',],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
