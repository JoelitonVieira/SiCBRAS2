@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <span class="title">Início</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('quickadmin.user-actions.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('módulo_de_treinamento_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.modulo-de-treinamento.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('controle_de_treinamento2_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.controle-de-treinamento2.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('treinamento_access')
                            <li>
                                <a href="{{ route('admin.treinamentos.index') }}">
                                    <i class="fa fa-pencil"></i>
                                    <span>@lang('quickadmin.treinamento.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('gerenciar_iten_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pencil-square-o"></i>
                            <span>@lang('quickadmin.gerenciar-itens.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('cargo_access')
                            <li>
                                <a href="{{ route('admin.cargos.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.cargos.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('setore_access')
                            <li>
                                <a href="{{ route('admin.setores.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.setores.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('funcionario_access')
                            <li>
                                <a href="{{ route('admin.funcionarios.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.funcionarios.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('turma_access')
                            <li>
                                <a href="{{ route('admin.turmas.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.turma.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('departamento_access')
                            <li>
                                <a href="{{ route('admin.departamentos.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.departamentos.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('tipo_de_treinamento_access')
                            <li>
                                <a href="{{ route('admin.tipo_de_treinamentos.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.tipo-de-treinamento.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('espec_treinamento_access')
                            <li>
                                <a href="{{ route('admin.espec_treinamentos.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.espec-treinamento.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('gerenciador_de_arquivo_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>@lang('quickadmin.gerenciador-de-arquivos.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('arquivo_access')
                            <li>
                                <a href="{{ route('admin.arquivos.index') }}">
                                    <i class="fa fa-file-pdf-o"></i>
                                    <span>@lang('quickadmin.arquivos.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('faq_management_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-question"></i>
                            <span>@lang('quickadmin.faq-management.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('questõe_access')
                            <li>
                                <a href="{{ route('admin.questões.index') }}">
                                    <i class="fa fa-question"></i>
                                    <span>@lang('quickadmin.questoes.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('módulo_de_estoque_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-chevron-circle-down"></i>
                    <span>@lang('quickadmin.modulo-de-estoque.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('gerenciar_itens_estoque_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.gerenciar-itens-estoque.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('materia_prima_access')
                            <li>
                                <a href="{{ route('admin.materia_primas.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.materia-prima.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('fornecedor_access')
                            <li>
                                <a href="{{ route('admin.fornecedors.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.fornecedor.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('entrada_de_matéria-prima_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>@lang('quickadmin.entrada-de-materia-prima.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('areium_access')
                            <li>
                                <a href="{{ route('admin.areias.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.areia.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('coque_access')
                            <li>
                                <a href="{{ route('admin.coques.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.coque.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('grafite_access')
                            <li>
                                <a href="{{ route('admin.grafites.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.grafite.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('pasta_a_frio_ou_briquete_access')
                            <li>
                                <a href="{{ route('admin.pasta_a_frio_ou_briquetes.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.pasta-a-frio-ou-briquete.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('saída_de_matéria_prima_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.saida-de-materia-prima.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('areia_saida_access')
                            <li>
                                <a href="{{ route('admin.areia_saidas.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.areia-saida.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('coque_saida_access')
                            <li>
                                <a href="{{ route('admin.coque_saidas.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.coque-saida.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('grafite_saida_access')
                            <li>
                                <a href="{{ route('admin.grafite_saidas.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.grafite-saida.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('pasta_a_frio_e_briquete_saida_access')
                            <li>
                                <a href="{{ route('admin.pasta_a_frio_e_briquete_saidas.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>@lang('quickadmin.pasta-a-frio-e-briquete-saida.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('mistura_nova_access')
                    <li>
                        <a href="{{ route('admin.mistura_novas.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.mistura-nova.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('solicitacao_de_analise_access')
                    <li>
                        <a href="{{ route('admin.solicitacao_de_analises.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.solicitacao-de-analise.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('módulo_de_qualidade_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-card-o"></i>
                    <span>@lang('quickadmin.modulo-de-qualidade.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('gerenciar_cliente_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i>
                            <span>@lang('quickadmin.gerenciar-clientes.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('cliente_access')
                            <li>
                                <a href="{{ route('admin.clientes.index') }}">
                                    <i class="fa fa-users"></i>
                                    <span>@lang('quickadmin.clientes.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('produto_access')
                            <li>
                                <a href="{{ route('admin.produtos.index') }}">
                                    <i class="fa fa-first-order"></i>
                                    <span>@lang('quickadmin.produtos.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('contato_access')
                            <li>
                                <a href="{{ route('admin.contatos.index') }}">
                                    <i class="fa fa-volume-control-phone"></i>
                                    <span>@lang('quickadmin.contato.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('especificacao_access')
                            <li>
                                <a href="{{ route('admin.especificacaos.index') }}">
                                    <i class="fa fa-plus-square-o"></i>
                                    <span>@lang('quickadmin.especificacao.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('solicitações_de_analise_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pencil-square-o"></i>
                            <span>@lang('quickadmin.solicitacoes-de-analise.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('solicitar_amostra_access')
                            <li>
                                <a href="{{ route('admin.solicitar_amostras.index') }}">
                                    <i class="fa fa-cart-plus"></i>
                                    <span>@lang('quickadmin.solicitar-amostra.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('amostra_granulometrium_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cubes"></i>
                            <span>@lang('quickadmin.amostra-granulometria.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('composicao_fisica_access')
                            <li>
                                <a href="{{ route('admin.composicao_fisicas.index') }}">
                                    <i class="fa fa-cube"></i>
                                    <span>@lang('quickadmin.composicao-fisica.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('composicao_granulometrica_access')
                            <li>
                                <a href="{{ route('admin.composicao_granulometricas.index') }}">
                                    <i class="fa fa-adjust"></i>
                                    <span>@lang('quickadmin.composicao-granulometrica.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('analise_granulometrica_access')
                            <li>
                                <a href="{{ route('admin.analise_granulometricas.index') }}">
                                    <i class="fa fa-diamond"></i>
                                    <span>@lang('quickadmin.analise-granulometrica.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('resultados_fisico_access')
                            <li>
                                <a href="{{ route('admin.resultados_fisicos.index') }}">
                                    <i class="fa fa-filter"></i>
                                    <span>@lang('quickadmin.resultados-fisico.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('ensaios_químico_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-flask"></i>
                            <span>@lang('quickadmin.ensaios-quimicos.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('composicao_quimica_access')
                            <li>
                                <a href="{{ route('admin.composicao_quimicas.index') }}">
                                    <i class="fa fa-connectdevelop"></i>
                                    <span>@lang('quickadmin.composicao-quimica.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('analise_quimica_access')
                            <li>
                                <a href="{{ route('admin.analise_quimicas.index') }}">
                                    <i class="fa fa-joomla"></i>
                                    <span>@lang('quickadmin.analise-quimica.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('resultados_quimico_access')
                            <li>
                                <a href="{{ route('admin.resultados_quimicos.index') }}">
                                    <i class="fa fa-braille"></i>
                                    <span>@lang('quickadmin.resultados-quimicos.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

