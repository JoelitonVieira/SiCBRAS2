<?php

$factory->define(App\PastaAFrioOuBriquete::class, function (Faker\Generator $faker) {
    return [
        "materia_prima" => collect(["Pasta a Frio","Pasta Briquete",])->random(),
        "data" => $faker->date("d-m-Y", $max = 'now'),
        "num_nf" => $faker->name,
        "transportadora" => $faker->name,
        "fornecedor_id" => factory('App\Fornecedor')->create(),
        "quantidade" => $faker->name,
        "entrada_acumulada" => $faker->name,
        "observacoes" => $faker->name,
    ];
});
