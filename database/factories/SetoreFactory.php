<?php

$factory->define(App\Setore::class, function (Faker\Generator $faker) {
    return [
        "nome_setores" => $faker->name,
    ];
});
