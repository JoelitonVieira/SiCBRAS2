<?php

$factory->define(App\SolicitarAmostra::class, function (Faker\Generator $faker) {
    return [
        "setor" => $faker->name,
        "data" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "equipamento" => $faker->name,
        "amostra" => collect(["Acabado","Semi-acabado","Teste",])->random(),
        "responsavel" => $faker->name,
        "referencia" => $faker->name,
        "alimentacao" => $faker->name,
        "od_producao" => $faker->name,
        "bag_pallet" => $faker->name,
        "peso" => $faker->randomNumber(2),
        "cd_especificacao_id" => factory('App\Especificacao')->create(),
    ];
});
