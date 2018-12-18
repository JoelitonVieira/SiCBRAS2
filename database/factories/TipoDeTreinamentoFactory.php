<?php

$factory->define(App\TipoDeTreinamento::class, function (Faker\Generator $faker) {
    return [
        "nome_tipo_treinamento" => $faker->name,
    ];
});
