<?php

$factory->define(App\Fornecedor::class, function (Faker\Generator $faker) {
    return [
        "nome_fantasia" => $faker->name,
        "matprima_fornecida" => $faker->name,
        "telefone" => $faker->name,
        "email" => $faker->safeEmail,
    ];
});
