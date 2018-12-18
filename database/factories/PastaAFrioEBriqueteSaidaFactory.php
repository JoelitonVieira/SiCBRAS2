<?php

$factory->define(App\PastaAFrioEBriqueteSaida::class, function (Faker\Generator $faker) {
    return [
        "materia_prima" => collect(["Pasta a Frio","Pasta Briquete",])->random(),
        "data" => $faker->date("d-m-Y", $max = 'now'),
        "lider_saida" => $faker->name,
        "forno_saida" => collect(["F1","F2","F3","F4",])->random(),
        "operacao" => $faker->name,
        "saida" => $faker->name,
        "saida_acumulada" => $faker->name,
        "observacoes" => $faker->name,
    ];
});
