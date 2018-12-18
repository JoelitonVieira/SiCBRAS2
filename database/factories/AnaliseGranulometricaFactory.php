<?php

$factory->define(App\AnaliseGranulometrica::class, function (Faker\Generator $faker) {
    return [
        "resultados_penr" => $faker->name,
        "data" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "status" => collect(["Aprovado","Reprovado",])->random(),
        "fk_solicitar_amostrar_id" => factory('App\SolicitarAmostra')->create(),
    ];
});
