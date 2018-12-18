<?php

$factory->define(App\Treinamento::class, function (Faker\Generator $faker) {
    return [
        "nome_treinamento_id" => factory('App\Turma')->create(),
        "carga_horaria" => $faker->date("H:i:s", $max = 'now'),
        "nome_setores_id" => factory('App\Setore')->create(),
        "data_inicio" => $faker->date("d-m-Y", $max = 'now'),
        "data_conclusao" => $faker->date("d-m-Y", $max = 'now'),
        "validadade" => $faker->randomNumber(2),
        "reciclagem" => collect(["Sim","Não",])->random(),
        "situacao_turma" => collect(["Aberta","Concluída","Planejada",])->random(),
        "localidade" => collect(["Sala de Treinamento","Área de Produção","Ambos",])->random(),
        "disponibilidade" => collect(["Recurso Interno","Recurso Externo",])->random(),
        "instrutor_id" => factory('App\Funcionario')->create(),
        "tipo_treinamento_id" => factory('App\TipoDeTreinamento')->create(),
        "espec_treinamento_id" => factory('App\EspecTreinamento')->create(),
        "horas" => $faker->date("d-m-Y H:i:s", $max = 'now'),
    ];
});
