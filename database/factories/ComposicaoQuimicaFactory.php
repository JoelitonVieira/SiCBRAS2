<?php

$factory->define(App\ComposicaoQuimica::class, function (Faker\Generator $faker) {
    return [
        "comp" => $faker->name,
        "max" => $faker->randomFloat(2, 1, 100),
        "minimo" => $faker->randomFloat(2, 1, 100),
        "cd_especificacao_id" => factory('App\Especificacao')->create(),
    ];
});
