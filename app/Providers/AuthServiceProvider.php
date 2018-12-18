<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 5]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 5]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 5]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 5]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Módulo de treinamento
        Gate::define('módulo_de_treinamento_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Controle de treinamento2
        Gate::define('controle_de_treinamento2_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Treinamento
        Gate::define('treinamento_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('treinamento_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('treinamento_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('treinamento_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('treinamento_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Gerenciar itens
        Gate::define('gerenciar_iten_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Cargos
        Gate::define('cargo_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('cargo_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('cargo_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('cargo_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('cargo_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Setores
        Gate::define('setore_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('setore_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('setore_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('setore_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('setore_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Funcionarios
        Gate::define('funcionario_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('funcionario_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('funcionario_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('funcionario_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('funcionario_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Turma
        Gate::define('turma_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('turma_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('turma_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('turma_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('turma_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Departamentos
        Gate::define('departamento_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('departamento_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('departamento_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('departamento_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('departamento_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tipo de treinamento
        Gate::define('tipo_de_treinamento_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tipo_de_treinamento_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tipo_de_treinamento_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tipo_de_treinamento_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tipo_de_treinamento_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Espec treinamento
        Gate::define('espec_treinamento_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('espec_treinamento_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('espec_treinamento_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('espec_treinamento_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('espec_treinamento_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Gerenciador de arquivos
        Gate::define('gerenciador_de_arquivo_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Arquivos
        Gate::define('arquivo_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('arquivo_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('arquivo_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('arquivo_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('arquivo_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Faq management
        Gate::define('faq_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Questões
        Gate::define('questõe_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Módulo de estoque
        Gate::define('módulo_de_estoque_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });

        // Auth gates for: Gerenciar itens estoque
        Gate::define('gerenciar_itens_estoque_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });

        // Auth gates for: Materia prima
        Gate::define('materia_prima_access', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('materia_prima_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('materia_prima_edit', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('materia_prima_view', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('materia_prima_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Fornecedor
        Gate::define('fornecedor_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('fornecedor_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('fornecedor_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('fornecedor_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('fornecedor_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Entrada de matéria-prima
        Gate::define('entrada_de_matéria-prima_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });

        // Auth gates for: Areia
        Gate::define('areium_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('areium_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('areium_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('areium_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('areium_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Coque
        Gate::define('coque_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('coque_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('coque_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('coque_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('coque_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Grafite
        Gate::define('grafite_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('grafite_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('grafite_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('grafite_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('grafite_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Pasta a frio ou briquete
        Gate::define('pasta_a_frio_ou_briquete_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('pasta_a_frio_ou_briquete_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('pasta_a_frio_ou_briquete_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('pasta_a_frio_ou_briquete_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('pasta_a_frio_ou_briquete_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Saída de matéria prima
        Gate::define('saída_de_matéria_prima_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });

        // Auth gates for: Areia saida
        Gate::define('areia_saida_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('areia_saida_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('areia_saida_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('areia_saida_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('areia_saida_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Coque saida
        Gate::define('coque_saida_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('coque_saida_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('coque_saida_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('coque_saida_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('coque_saida_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Grafite saida
        Gate::define('grafite_saida_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('grafite_saida_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('grafite_saida_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('grafite_saida_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('grafite_saida_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Pasta a frio e briquete saida
        Gate::define('pasta_a_frio_e_briquete_saida_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('pasta_a_frio_e_briquete_saida_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('pasta_a_frio_e_briquete_saida_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('pasta_a_frio_e_briquete_saida_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('pasta_a_frio_e_briquete_saida_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Mistura nova
        Gate::define('mistura_nova_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('mistura_nova_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('mistura_nova_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('mistura_nova_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('mistura_nova_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Solicitacao de analise
        Gate::define('solicitacao_de_analise_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('solicitacao_de_analise_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('solicitacao_de_analise_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('solicitacao_de_analise_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('solicitacao_de_analise_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Módulo de qualidade
        Gate::define('módulo_de_qualidade_access', function ($user) {
            return in_array($user->role_id, [1, 5, 6, 7, 8]);
        });

        // Auth gates for: Gerenciar clientes
        Gate::define('gerenciar_cliente_access', function ($user) {
            return in_array($user->role_id, [1, 5, 7, 8]);
        });

        // Auth gates for: Clientes
        Gate::define('cliente_access', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('cliente_create', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('cliente_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('cliente_view', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('cliente_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Produtos
        Gate::define('produto_access', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('produto_create', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('produto_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('produto_view', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('produto_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Contato
        Gate::define('contato_access', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('contato_create', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('contato_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('contato_view', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('contato_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Especificacao
        Gate::define('especificacao_access', function ($user) {
            return in_array($user->role_id, [1, 5, 7, 8]);
        });
        Gate::define('especificacao_create', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('especificacao_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('especificacao_view', function ($user) {
            return in_array($user->role_id, [1, 5, 7, 8]);
        });
        Gate::define('especificacao_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Solicitações de analise
        Gate::define('solicitações_de_analise_access', function ($user) {
            return in_array($user->role_id, [1, 5, 6, 7, 8]);
        });

        // Auth gates for: Solicitar amostra
        Gate::define('solicitar_amostra_access', function ($user) {
            return in_array($user->role_id, [1, 5, 6, 7, 8]);
        });
        Gate::define('solicitar_amostra_create', function ($user) {
            return in_array($user->role_id, [1, 5, 6]);
        });
        Gate::define('solicitar_amostra_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('solicitar_amostra_view', function ($user) {
            return in_array($user->role_id, [1, 5, 6, 7, 8]);
        });
        Gate::define('solicitar_amostra_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Amostra granulometria
        Gate::define('amostra_granulometrium_access', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });

        // Auth gates for: Composicao fisica
        Gate::define('composicao_fisica_access', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('composicao_fisica_create', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('composicao_fisica_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('composicao_fisica_view', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('composicao_fisica_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Composicao granulometrica
        Gate::define('composicao_granulometrica_access', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('composicao_granulometrica_create', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('composicao_granulometrica_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('composicao_granulometrica_view', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('composicao_granulometrica_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Analise granulometrica
        Gate::define('analise_granulometrica_access', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('analise_granulometrica_create', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('analise_granulometrica_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('analise_granulometrica_view', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('analise_granulometrica_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Resultados fisico
        Gate::define('resultados_fisico_access', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('resultados_fisico_create', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('resultados_fisico_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('resultados_fisico_view', function ($user) {
            return in_array($user->role_id, [1, 5, 8]);
        });
        Gate::define('resultados_fisico_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Ensaios químicos
        Gate::define('ensaios_químico_access', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });

        // Auth gates for: Composicao quimica
        Gate::define('composicao_quimica_access', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });
        Gate::define('composicao_quimica_create', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });
        Gate::define('composicao_quimica_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('composicao_quimica_view', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });
        Gate::define('composicao_quimica_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Analise quimica
        Gate::define('analise_quimica_access', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });
        Gate::define('analise_quimica_create', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });
        Gate::define('analise_quimica_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('analise_quimica_view', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });
        Gate::define('analise_quimica_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

        // Auth gates for: Resultados quimicos
        Gate::define('resultados_quimico_access', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });
        Gate::define('resultados_quimico_create', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });
        Gate::define('resultados_quimico_edit', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });
        Gate::define('resultados_quimico_view', function ($user) {
            return in_array($user->role_id, [1, 5, 7]);
        });
        Gate::define('resultados_quimico_delete', function ($user) {
            return in_array($user->role_id, [1, 5]);
        });

    }
}
