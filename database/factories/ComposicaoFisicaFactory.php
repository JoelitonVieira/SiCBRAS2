<?php

$factory->define(App\ComposicaoFisica::class, function (Faker\Generator $faker) {
    return [
        "granulometria" => $faker->name,
        "maximo" => $faker->name,
        "minimo" => $faker->name,
        "cd_especificacao_id" => factory('App\Especificacao')->create(),
    ];
});
