<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Super Administrador',],
            ['id' => 2, 'title' => 'Administrador  (Treinamento)',],
            ['id' => 3, 'title' => 'Administrador  (Estoque)',],
            ['id' => 4, 'title' => 'Usuário Simples',],
            ['id' => 5, 'title' => 'Administrador  (Qualidade)',],
            ['id' => 6, 'title' => 'Utilizador simples (Setores e afins)	',],
            ['id' => 7, 'title' => 'Analista do Laboratório Químico',],
            ['id' => 8, 'title' => 'Analista do Laboratório Físico',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
