<?php

$factory->define(App\ResultadosFisico::class, function (Faker\Generator $faker) {
    return [
        "resultado_pesado" => $faker->randomFloat(2, 1, 100),
        "resultado_encontrado" => $faker->randomFloat(2, 1, 100),
        "nr_analise_id" => factory('App\AnaliseGranulometrica')->create(),
    ];
});
