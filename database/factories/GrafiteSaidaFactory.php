<?php

$factory->define(App\GrafiteSaida::class, function (Faker\Generator $faker) {
    return [
        "data" => $faker->date("d-m-Y", $max = 'now'),
        "nome_lider" => $faker->name,
        "forno" => collect(["F1","F2","F3","F4",])->random(),
        "operacao" => $faker->randomNumber(2),
        "saida" => $faker->name,
        "umidade" => $faker->name,
        "quantidade_real" => $faker->name,
        "saida_acumulada" => $faker->name,
        "observacoes" => $faker->name,
        "quantidade_bags" => $faker->name,
        "fornecedor_id" => factory('App\Fornecedor')->create(),
    ];
});
