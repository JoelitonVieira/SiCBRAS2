<?php

$factory->define(App\MateriaPrima::class, function (Faker\Generator $faker) {
    return [
        "cod_matprima" => $faker->name,
        "nome_matprima" => $faker->name,
    ];
});
