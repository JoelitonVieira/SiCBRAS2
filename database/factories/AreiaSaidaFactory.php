<?php

$factory->define(App\AreiaSaida::class, function (Faker\Generator $faker) {
    return [
        "data" => $faker->date("d-m-Y", $max = 'now'),
        "lider" => $faker->name,
        "forno" => collect(["F1","F2","F3","F4",])->random(),
        "saida" => $faker->name,
        "saida_acumulada" => $faker->name,
        "observacao" => $faker->name,
    ];
});
