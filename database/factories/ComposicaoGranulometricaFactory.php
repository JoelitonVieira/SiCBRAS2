<?php

$factory->define(App\ComposicaoGranulometrica::class, function (Faker\Generator $faker) {
    return [
        "telas" => $faker->name,
        "maximo" => $faker->randomFloat(2, 1, 100),
        "minimo" => $faker->randomFloat(2, 1, 100),
        "cd_especificacao_id" => factory('App\Especificacao')->create(),
    ];
});
