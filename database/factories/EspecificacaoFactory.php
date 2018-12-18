<?php

$factory->define(App\Especificacao::class, function (Faker\Generator $faker) {
    return [
        "codigo" => $faker->name,
        "data" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "requisito_iso" => $faker->name,
        "nome_cliente_id" => factory('App\Cliente')->create(),
        "cd_produto_id" => factory('App\Produto')->create(),
    ];
});
