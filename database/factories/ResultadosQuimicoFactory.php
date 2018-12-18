<?php

$factory->define(App\ResultadosQuimico::class, function (Faker\Generator $faker) {
    return [
        "data" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "op_forno" => $faker->name,
        "quantidade" => $faker->randomNumber(2),
        "numeracao" => $faker->name,
        "sic_flourizado" => $faker->randomFloat(2, 1, 100),
        "sic" => $faker->randomFloat(2, 1, 100),
        "ppc" => $faker->randomFloat(2, 1, 100),
        "c_reagido" => $faker->randomFloat(2, 1, 100),
        "si_reagido" => $faker->randomFloat(2, 1, 100),
        "si_livre" => $faker->randomFloat(2, 1, 100),
        "sio2" => $faker->randomFloat(2, 1, 100),
        "si_sio2" => $faker->randomFloat(2, 1, 100),
        "fe2o3" => $faker->randomFloat(2, 1, 100),
        "al2o3" => $faker->randomFloat(2, 1, 100),
        "cao" => $faker->randomFloat(2, 1, 100),
        "mgo" => $faker->randomFloat(2, 1, 100),
        "observa" => $faker->name,
        "status" => collect(["Aprovado","Reprovado ",])->random(),
        "n_analis_id" => factory('App\AnaliseQuimica')->create(),
        "c_livgre" => $faker->randomFloat(2, 1, 100),
    ];
});
