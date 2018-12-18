<?php

$factory->define(App\Contato::class, function (Faker\Generator $faker) {
    return [
        "telefone_2" => $faker->name,
        "email_2" => $faker->name,
        "nome_cliente_id" => factory('App\Cliente')->create(),
    ];
});
