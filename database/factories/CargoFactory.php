<?php

$factory->define(App\Cargo::class, function (Faker\Generator $faker) {
    return [
        "nome_cargo" => $faker->name,
    ];
});
