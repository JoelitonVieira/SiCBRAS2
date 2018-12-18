<?php

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {
    return [
        "nome_cliente" => $faker->name,
        "cpf" => $faker->name,
        "cnpj" => $faker->name,
        "email_cliente" => $faker->safeEmail,
        "telefone" => $faker->name,
    ];
});
