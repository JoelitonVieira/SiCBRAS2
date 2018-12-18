<?php

$factory->define(App\MisturaNova::class, function (Faker\Generator $faker) {
    return [
        "data" => $faker->name,
        "numero_cf" => $faker->name,
        "numero_kf" => $faker->name,
        "kg_coquebase" => $faker->name,
        "kg_areiabase" => $faker->name,
        "kg_coquereal" => $faker->name,
        "kg_areiareal" => $faker->name,
        "mediacoque" => $faker->name,
        "mediaareia" => $faker->name,
        "num_batelada" => $faker->name,
        "turnos" => collect(["06 - 14","14 - 22","22 - 06",])->random(),
        "coque_total" => $faker->name,
        "areia_total" => $faker->name,
        "total_batelada" => $faker->name,
        "total_misturadia" => $faker->name,
        "mistura_total" => $faker->name,
    ];
});
