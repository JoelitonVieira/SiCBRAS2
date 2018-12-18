<?php

$factory->define(App\Departamento::class, function (Faker\Generator $faker) {
    return [
        "nome_departamento" => $faker->name,
    ];
});
