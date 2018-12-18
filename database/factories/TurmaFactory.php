<?php

$factory->define(App\Turma::class, function (Faker\Generator $faker) {
    return [
        "nome_treinamento" => $faker->name,
    ];
});
