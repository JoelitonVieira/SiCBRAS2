<?php

$factory->define(App\Produto::class, function (Faker\Generator $faker) {
    return [
        "codigo" => $faker->name,
        "produto" => $faker->name,
        "granulometria" => $faker->name,
    ];
});
