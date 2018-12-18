<?php

$factory->define(App\EspecTreinamento::class, function (Faker\Generator $faker) {
    return [
        "nome_espectreinamento" => $faker->name,
    ];
});
