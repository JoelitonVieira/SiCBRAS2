<?php

$factory->define(App\Coque::class, function (Faker\Generator $faker) {
    return [
        "data_recebimento" => $faker->date("d-m-Y", $max = 'now'),
        "data_expedicao" => $faker->date("d-m-Y", $max = 'now'),
        "transportadora" => $faker->name,
        "fornecedor_id" => factory('App\Fornecedor')->create(),
        "nota_fiscal" => $faker->randomFloat(2, 1, 100),
        "cte" => $faker->randomNumber(2),
        "peso_nf" => $faker->name,
        "peso_sicbras" => $faker->randomFloat(2, 1, 100),
        "diferenca" => $faker->randomFloat(2, 1, 100),
        "rs_acordo" => $faker->name,
        "cambio" => $faker->name,
        "dolar_acordo" => $faker->name,
        "valor_nota" => $faker->randomFloat(2, 1, 100),
        "rs_real_imposto" => $faker->name,
        "icms" => $faker->name,
        "pis_confins" => $faker->randomFloat(2, 1, 100),
        "ipi" => $faker->name,
        "encargo_30" => $faker->name,
        "rs_real_semimposto" => $faker->name,
        "dolar_sem_imposto" => $faker->name,
        "valor_frete" => $faker->randomFloat(2, 1, 100),
        "rs_frete" => $faker->randomFloat(2, 1, 100),
        "saldo_retirar" => $faker->name,
    ];
});
