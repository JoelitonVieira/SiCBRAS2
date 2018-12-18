<?php

$factory->define(App\Grafite::class, function (Faker\Generator $faker) {
    return [
        "data" => $faker->date("d-m-Y", $max = 'now'),
        "nota_fiscal" => $faker->name,
        "transportadora" => $faker->name,
        "fornecedor_id" => factory('App\Fornecedor')->create(),
        "forno" => collect(["F1","F2","F3","F4",])->random(),
        "operacao" => $faker->randomNumber(2),
        "quantidade" => $faker->name,
        "umidade" => $faker->name,
        "quantidade_real" => $faker->name,
        "entrada_acumulada" => $faker->name,
        "observacoes" => $faker->name,
        "quantidade_bags" => $faker->name,
    ];
});
