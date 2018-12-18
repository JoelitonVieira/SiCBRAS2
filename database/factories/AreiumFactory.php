<?php

$factory->define(App\Areium::class, function (Faker\Generator $faker) {
    return [
        "data" => $faker->date("d-m-Y", $max = 'now'),
        "fornecedor_id" => factory('App\Fornecedor')->create(),
        "num_nf" => $faker->name,
        "cte" => $faker->randomNumber(2),
        "peso_nf" => $faker->name,
        "peso_sicbras" => $faker->name,
        "diferenca" => $faker->name,
        "valor_prod" => $faker->name,
        "valor_frete" => $faker->name,
        "rs_areia" => $faker->name,
        "rs_frete" => $faker->name,
        "saldo_retirar" => $faker->randomFloat(2, 1, 100),
    ];
});
