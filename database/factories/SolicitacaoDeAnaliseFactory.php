<?php

$factory->define(App\SolicitacaoDeAnalise::class, function (Faker\Generator $faker) {
    return [
        "turnos" => collect(["6-14","14-22","22-6","Administrador ",])->random(),
        "nome_resp_amostragem" => $faker->name,
        "mat_primas" => collect(["Coque","Areia",])->random(),
        "lote_ano" => $faker->name,
        "tipos_graf" => collect(["Grafite Sintético","Grafite Homogênea","Grafite Recirculada",])->random(),
        "n_op" => $faker->randomNumber(2),
        "forno" => $faker->name,
        "fornecedor_id" => factory('App\Fornecedor')->create(),
        "origem" => $faker->name,
        "tipos_de_misturas" => collect(["Mistura Virgem","Mistura Recirculada Acima U","Mistura Recirculada Abaixo U",])->random(),
        "numero_operacao" => $faker->name,
        "fornos_das_misturas" => $faker->name,
        "amostra_teste" => collect(["Sim","Não",])->random(),
        "material" => $faker->name,
        "identificacao_da_amostra" => $faker->name,
    ];
});
