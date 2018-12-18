<?php

$factory->define(App\Funcionario::class, function (Faker\Generator $faker) {
    return [
        "numero_matricula" => $faker->randomNumber(2),
        "nome_funcionario" => $faker->name,
        "nome_cargo_id" => factory('App\Cargo')->create(),
        "nome_departamento_id" => factory('App\Departamento')->create(),
        "nome_setor_id" => factory('App\Setore')->create(),
        "instrutor" => collect(["Sim","Não",])->random(),
        "situacao" => collect(["Ativo","Inativo",])->random(),
    ];
});
