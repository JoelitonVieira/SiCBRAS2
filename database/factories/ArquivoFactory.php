<?php

$factory->define(App\Arquivo::class, function (Faker\Generator $faker) {
    return [
        "nome_arquivo" => $faker->name,
    ];
});
