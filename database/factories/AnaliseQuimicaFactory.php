<?php

$factory->define(App\AnaliseQuimica::class, function (Faker\Generator $faker) {
    return [
        "material" => $faker->name,
        "nu_analise" => $faker->name,
        "data" => $faker->date("d-m-Y", $max = 'now'),
        "fk_solicitar_amostra_id" => factory('App\SolicitarAmostra')->create(),
    ];
});
