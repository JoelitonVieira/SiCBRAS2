<?php

return [
		'user-management' => [		'title' => 'Controle de Usuários',		'fields' => [		],	],
		'roles' => [		'title' => 'Regras',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Usuários',		'fields' => [			'name' => 'Nome',			'matricula' => 'Matrícula',			'password' => 'Senha',			'role' => 'Tipo',			'remember-token' => 'Lembrar Senha',		],	],
		'user-actions' => [		'title' => 'Ações de Usuários',		'created_at' => 'Time',		'fields' => [			'user' => 'Usuário',			'action' => 'Ação',			'action-model' => 'Tabela',			'action-id' => 'ID',		],	],
		'modulo-de-treinamento' => [		'title' => 'Módulo de Treinamento',		'fields' => [		],	],
		'gerenciar-itens' => [		'title' => 'Gerenciar itens',		'fields' => [		],	],
		'gerenciador-de-arquivos' => [		'title' => 'Gerenciador de Arquivos',		'fields' => [		],	],
		'controle-de-treinamento' => [		'title' => 'Controle de Treinamento',		'fields' => [		],	],
		'modulo-de-estoque' => [		'title' => 'Módulo de Estoque',		'fields' => [		],	],
		'gerenciar-itens-estoque' => [		'title' => 'Gerenciar Itens',		'fields' => [		],	],
		'entrada-de-materia-prima' => [		'title' => 'Entrada de Matéria-Prima',		'fields' => [		],	],
		'saida-de-materia-prima' => [		'title' => 'Saída de Matéria Prima',		'fields' => [		],	],
		'mistura-nova' => [		'title' => 'Mistura Nova',		'fields' => [			'data' => 'Data ',			'numero-cf' => 'Numero CF',			'numero-kf' => 'Numero KF',			'kg-coquebase' => 'KG Coque Base',			'kg-areiabase' => 'KG Areia Base',			'kg-coquereal' => 'KG Coque Real',			'kg-areiareal' => 'KG Areia Real',			'mediacoque' => 'Média Coque',			'mediaareia' => 'Média Areia',			'num-batelada' => 'Número de Bateladas',			'turnos' => 'Turno',			'coque-total' => 'Coque Total',			'areia-total' => 'Areia Total',			'total-batelada' => 'Total de Bateladas',			'total-misturadia' => 'Total Mistura do Dia',			'mistura-total' => 'Mistura Total',		],	],
		'solicitacao-de-analise' => [		'title' => 'Solicitação de Análise',		'fields' => [			'turnos' => 'Turnos',			'nome-resp-amostragem' => 'NOME RESP. AMOSTRAGEM',			'mat-primas' => 'Escolha a Matéria Prima',			'lote-ano' => 'Lote e Ano',			'tipos-graf' => 'Tipos de Grafites ',			'n-op' => 'Número de Operação',			'forno' => 'Forno',			'fornecedor' => 'Fornecedor',			'origem' => 'Origem',			'tipos-de-misturas' => 'Tipos de Misturas',			'numero-operacao' => 'Numero Operação das Misturas',			'fornos-das-misturas' => 'Fornos das Misturas',			'amostra-teste' => 'Amostra Testada',			'material' => 'Material',			'identificacao-da-amostra' => 'Identificação da amostra',		],	],
		'cargos' => [		'title' => 'Cargos',		'fields' => [			'nome-cargo' => 'Nome do Cargo',		],	],
		'setores' => [		'title' => 'Setores',		'fields' => [			'nome-setores' => 'Nome do Setor',		],	],
		'treinamento' => [		'title' => 'Turmas',		'fields' => [		],	],
		'funcionarios' => [		'title' => 'Funcionários',		'fields' => [			'numero-matricula' => 'Matrícula:',			'nome-funcionario' => 'Nome:',			'nome-cargo' => 'Cargo:',			'nome-departamento' => 'Departamento',			'nome-setor' => 'Setor',			'instrutor' => 'Instrutor:',			'situacao' => 'Situação:',		],	],
		'turma' => [		'title' => 'Treinamento',		'fields' => [			'nome-treinamento' => 'Nome do Treinamento:',		],	],
		'departamentos' => [		'title' => 'Departamentos',		'fields' => [			'nome-departamento' => 'Nome do Departamento',		],	],
		'tipo-de-treinamento' => [		'title' => 'Tipo de Treinamento',		'fields' => [			'nome-tipo-treinamento' => 'Tipo de Treinamento',		],	],
		'espec-treinamento' => [		'title' => 'Espec. de treinamento',		'fields' => [			'nome-espectreinamento' => 'Especificação de Treinamento',		],	],
		'arquivos' => [		'title' => 'Incluir / Listar Arquivos',		'fields' => [			'nome-arquivo' => 'Nome do Documento:',			'arquivo' => 'Importar Arquivo:',		],	],
		'materia-prima' => [		'title' => 'Matéria Prima',		'fields' => [			'cod-matprima' => 'Código da Matéria-Prima',			'nome-matprima' => 'Nome da Matéria-Prima',		],	],
		'fornecedor' => [		'title' => 'Fornecedor',		'fields' => [			'nome-fantasia' => 'Nome Fantasia',			'matprima-fornecida' => 'Matéria-Prima Fornecida',			'telefone' => 'Telefone',			'email' => 'E-mail',		],	],
		'areia' => [		'title' => 'Areia',		'fields' => [		],	],
		'coque-saida' => [		'title' => 'Coque Bruto',		'fields' => [		],	],
		'grafite-saida' => [		'title' => 'Grafite',		'fields' => [		],	],
		'pasta-a-frio-e-briquete-saida' => [		'title' => 'Pasta a frio ou Pasta Briquete',		'fields' => [		],	],
		'areia' => [		'title' => 'Areia',		'fields' => [			'data' => 'Data',			'fornecedor' => 'Fornecedor',			'num-nf' => 'Nota Fiscal / Voucher',			'cte' => 'CTE',			'peso-nf' => 'Peso nota fiscal',			'peso-sicbras' => 'Peso balança Sicbras',			'diferenca' => 'Diferença',			'valor-prod' => 'Valor Produto',			'valor-frete' => 'Valor Frete',			'rs-areia' => 'R$ /t Areia',			'rs-frete' => 'R$/ t Frete',			'saldo-retirar' => 'Saldo a Retirar',		],	],
		'coque' => [		'title' => 'Coque Bruto',		'fields' => [			'data-recebimento' => 'Data de Recebimento',			'data-expedicao' => 'Data de Expedição',			'transportadora' => 'Transportadora',			'fornecedor' => 'Fornecedor',			'nota-fiscal' => 'Nota Fiscal',			'cte' => 'CTE',			'peso-nf' => 'Peso Nota Fiscal',			'peso-sicbras' => 'Peso balança Sicbras',			'diferenca' => 'Diferença',			'rs-acordo' => 'R$/ t Acordo',			'cambio' => 'Câmbio Vigente',			'dolar-acordo' => '$/ t Acordo',			'valor-nota' => 'Valor da Nota',			'rs-real-imposto' => 'R$/ t Real com Imposto',			'icms' => 'ICMS',			'pis-confins' => 'PIS / Confins',			'ipi' => 'IPI',			'encargo-30' => 'Encargo 30 dias',			'rs-real-semimposto' => 'R$/ t Real sem Imposto',			'dolar-sem-imposto' => '$/t Real sem Imposto',			'valor-frete' => 'Valor do Frete',			'rs-frete' => 'R$/t Frete',			'saldo-retirar' => 'Saldo a Retirar',		],	],
		'grafite' => [		'title' => 'Grafite',		'fields' => [			'data' => 'Data',			'nota-fiscal' => 'Nota Fiscal',			'transportadora' => 'Transportadora',			'fornecedor' => 'Fornecedor',			'forno' => 'Forno',			'operacao' => 'Operação',			'quantidade' => 'Quantidade',			'umidade' => 'Umidade',			'quantidade-real' => 'Quantidade Real',			'entrada-acumulada' => 'Entrada Acumulada',			'observacoes' => 'Observações',			'quantidade-bags' => 'Quantidade de BAGs',		],	],
		'pasta-a-frio-ou-briquete' => [		'title' => 'Pasta a Frio ou Pasta Briquete',		'fields' => [			'materia-prima' => 'Matéria Prima',			'data' => 'Data',			'num-nf' => 'Nota Fiscal',			'transportadora' => 'Transportadora',			'fornecedor' => 'Fornecedor',			'quantidade' => 'Quantidade',			'entrada-acumulada' => 'Entrada Acumulada',			'observacoes' => 'Observações',		],	],
		'areia-saida' => [		'title' => 'Areia',		'fields' => [			'data' => 'Data',			'lider' => 'Líder',			'forno' => 'Forno',			'saida' => 'Saída',			'saida-acumulada' => 'Saída Acumulada',			'observacao' => 'Observações',		],	],
		'coque-saida' => [		'title' => 'Coque Bruto',		'fields' => [			'data' => 'Data',			'lider' => 'Líder',			'forno' => 'Forno',			'saida' => 'Saída',			'saida-acumulada' => 'Saída Acumulada',			'observacao' => 'Observações',		],	],
		'grafite-saida' => [		'title' => 'Grafite',		'fields' => [			'data' => 'Data',			'nome-lider' => 'Líder no turno',			'forno' => 'Forno',			'operacao' => 'Operação',			'saida' => 'Saída',			'umidade' => 'Umidade',			'quantidade-real' => 'Quantidade Real',			'saida-acumulada' => 'Saída Acumulada',			'observacoes' => 'Observações',			'quantidade-bags' => 'Quantidade de BAGs',			'fornecedor' => 'Fornecedor',		],	],
		'pasta-a-frio-e-briquete-saida' => [		'title' => 'Pasta a Frio ou Pasta Briquete',		'fields' => [			'materia-prima' => 'Matéria Prima',			'data' => 'Data',			'lider-saida' => 'Líder',			'forno-saida' => 'Forno',			'operacao' => 'Operação',			'saida' => 'Saída',			'saida-acumulada' => 'Saída Acumulada',			'observacoes' => 'Observações',		],	],
		'treinamento' => [		'title' => 'Turmas',		'fields' => [			'nome-treinamento' => 'Nome do Treinamento',			'carga-horaria' => 'Carga Horária:',			'nome-setores' => 'Setor',			'data-inicio' => 'Data de Início do Treinamento:',			'data-conclusao' => 'Data de Conclusão do Treinamento:',			'validadade' => 'Validade do Treinamento em Meses:',			'reciclagem' => 'Necessita de Reciclagem:',			'situacao-turma' => 'Situação da Turma: ',			'localidade' => 'Local do Treinamento:',			'disponibilidade' => 'Disponibilidade do Treinamento:',			'instrutor' => 'Instrutor',			'nome-participantes' => 'Participantes',			'tipo-treinamento' => 'Tipo treinamento',			'espec-treinamento' => 'Especificação do Treinamento',			'horas' => 'Horas',		],	],
		'controle-de-treinamento2' => [		'title' => 'Controle de Treinamento',		'fields' => [		],	],
		'faq-management' => [		'title' => 'FAQ',		'fields' => [		],	],
		'questoes' => [		'title' => 'Questões',		'fields' => [		],	],
		'modulo-de-qualidade' => [		'title' => 'Módulo de Qualidade',		'fields' => [		],	],
		'gerenciar-clientes' => [		'title' => 'Gerenciar Clientes',		'fields' => [		],	],
		'clientes' => [		'title' => 'Clientes',		'fields' => [			'nome-cliente' => 'Nome',			'cpf' => 'CPF',			'cnpj' => 'CNPJ',			'email-cliente' => 'Email',			'telefone' => 'Telefone',			'cep' => 'CEP',		],	],
		'solicitacoes-de-analise' => [		'title' => 'Solicitações de Analise ',		'fields' => [		],	],
		'solicitar-amostra' => [		'title' => 'Solicitar Amostra',		'fields' => [			'setor' => 'Setor',			'data' => 'Data',			'equipamento' => 'Equipamento',			'amostra' => 'Amostra',			'responsavel' => 'Responsável',			'referencia' => 'Referencia',			'alimentacao' => 'Alimentacao',			'od-producao' => 'Ordem de Produção',			'bag-pallet' => 'N° Bag/Pallet',			'peso' => 'Peso(KG)',			'cd-especificacao' => 'Código Especificação',		],	],
		'amostra-granulometria' => [		'title' => 'Amostra Granulometria',		'fields' => [		],	],
		'composicao-fisica' => [		'title' => 'Composicao fisica',		'fields' => [			'granulometria' => 'Composição',			'maximo' => 'Maximo',			'minimo' => 'Minimo',			'cd-especificacao' => 'Código Especificação',		],	],
		'composicao-granulometrica' => [		'title' => 'Composição Granulométrica',		'fields' => [			'telas' => 'Telas(mm)',			'maximo' => 'Maximo(mm)',			'minimo' => 'Minimo(mm)',			'cd-especificacao' => 'Código Especificação',		],	],
		'analise-granulometrica' => [		'title' => 'Analise Granulométrica',		'fields' => [			'resultados-penr' => 'N° Analise Física ',			'data' => 'Data',			'status' => 'Status',			'destino' => 'Destino',			'fk-solicitar-amostrar' => 'Amostra Ordem de Produção',		],	],
		'resultados-fisico' => [		'title' => 'Resultados Físico',		'fields' => [			'resultado-pesado' => 'Resultado Pesado',			'resultado-encontrado' => 'Resultado Encontrado',			'nr-analise' => 'N° Analise',		],	],
		'ensaios-quimicos' => [		'title' => 'Ensaios Químicos',		'fields' => [		],	],
		'ensaios-quimicos' => [		'title' => 'Ensaios Químicos',		'fields' => [		],	],
		'composicao-quimica' => [		'title' => 'Composição Química',		'fields' => [			'comp' => 'Composição ',			'max' => 'Maximo',			'minimo' => 'Minimo',			'cd-especificacao' => 'Código Especificação',		],	],
		'analise-quimica' => [		'title' => 'Analise Química  ',		'fields' => [			'material' => 'Material',			'nu-analise' => 'N° Analise',			'data' => 'Data',			'fk-solicitar-amostra' => 'Amostra Ordem de Produção',		],	],
		'resultados-quimicos' => [		'title' => 'Resultados Químicos',		'fields' => [			'data' => 'Data',			'op-forno' => 'Op/Forno',			'quantidade' => 'Quantidade',			'numeracao' => 'Numeração',			'sic-flourizado' => 'Sic%(Flourizado)',			'sic' => 'Sic%',			'ppc' => 'PPC%',			'c-reagido' => 'C-reagido%',			'si-reagido' => 'Si-reagido%',			'si-livre' => 'Si-livre%',			'sio2' => 'Sio2%',			'si-sio2' => 'Si + SiO2%',			'fe2o3' => 'Fe2o3',			'al2o3' => 'Al2O3%',			'cao' => 'CaO%',			'mgo' => 'MgO%',			'observa' => 'Observações',			'status' => 'Status',			'n-analis' => 'N° Analise',			'c-livgre' => 'C-livre',		],	],
		'contato' => [		'title' => 'Contato',		'fields' => [			'telefone-2' => 'Telefone 2',			'email-2' => 'Email 2',			'nome-cliente' => 'Cliente',		],	],
		'especificacao' => [		'title' => 'Especificação ',		'fields' => [			'codigo' => 'Codigo',			'data' => 'Data ',			'requisito-iso' => 'Requisito ISO',			'nome-cliente' => 'Cliente',			'cd-produto' => 'Código Produto',		],	],
		'produtos' => [		'title' => 'Produtos',		'fields' => [			'codigo' => 'Codigo',			'produto' => 'Produto',			'granulometria' => 'Granulometria',		],	],
	'qa_create' => 'Criar',
	'qa_save' => 'Guardar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Visualizar',
	'qa_update' => 'Atualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sem entradas na tabela',
	'qa_custom_controller_index' => 'Índice de Controller personalizado.',
	'qa_logout' => 'Sair',
	'qa_add_new' => 'Novo',
	'qa_are_you_sure' => 'Tem certeza?',
	'qa_back_to_list' => 'Voltar',
	'qa_dashboard' => 'Painel',
	'qa_delete' => 'Eliminar',
	'qa_restore' => 'Restaurar',
	'qa_permadel' => 'Eliminar',
	'qa_all' => 'Todos',
	'qa_trash' => 'Lixo',
	'qa_delete_selected' => 'Eliminar Selecionados',
	'qa_category' => 'Categoria',
	'qa_categories' => 'Categorias',
	'qa_sample_category' => 'Categoria Exemplo',
	'qa_questions' => 'Questões',
	'qa_question' => 'Questão',
	'qa_answer' => 'Resposta',
	'qa_administrator_can_create_other_users' => 'Administrador',
	'qa_simple_user' => 'Usuário simples',
	'qa_title' => 'Título',
	'qa_roles' => 'Funções',
	'qa_role' => 'Função',
	'qa_name' => 'Nome',
	'qa_password' => 'Senha',
	'qa_remember_token' => 'Lembrar Senha',
	'qa_permissions' => 'Permissões',
	'qa_action' => 'Ação',
	'qa_forgot_password' => 'Esqueceu-se da senha?',
	'qa_remember_me' => 'Lembrar',
	'qa_change_password' => 'Alterar senha',
	'qa_print' => 'Imprimir',
	'qa_copy' => 'Copiar',
	'qa_colvis' => 'Colunas Visíveis',
	'qa_reset_password' => 'Redefinir senha',
	'qa_email_greet' => 'Olá',
	'qa_confirm_password' => 'Confirmação da senha',
	'qa_please_select' => 'Selecione por favor',
	'qa_sample_question' => 'Questão Exemplo',
	'qa_sample_answer' => 'Resposta Exemplo',
	'qa_faq_management' => 'Gestão de FAQ',
	'qa_user_management' => 'Gestão de usuários',
	'qa_users' => 'Usuários',
	'qa_user' => 'Usuário',
	'qa_email' => 'E-mail',
	'qa_user_actions' => 'Ações do usuário',
	'qa_action_model' => 'Modelo de ação',
	'qa_action_id' => 'ID de ação',
	'qa_time' => 'Tempo',
	'qa_campaign' => 'Campanha',
	'qa_campaigns' => 'Campanhas',
	'qa_description' => 'Descrição',
	'qa_valid_from' => 'Válido de',
	'qa_valid_to' => 'Válido até',
	'qa_discount_amount' => 'Quantia de desconto',
	'qa_discount_percent' => 'Percentual de desconto',
	'qa_coupons_amount' => 'Quantia de cupons',
	'qa_coupons' => 'Cupons',
	'qa_code' => 'Código',
	'qa_redeem_time' => 'Tempo de resgate',
	'qa_coupon_management' => 'Gesão de cupons',
	'qa_time_management' => 'Gestão de tempo',
	'qa_projects' => 'Projetos',
	'qa_reports' => 'Relatórios',
	'qa_time_entries' => 'Entradas de tempo',
	'qa_work_type' => 'Tipo de trabalho',
	'qa_work_types' => 'Tipos de trabalho',
	'qa_project' => 'Projeto',
	'qa_start_time' => 'Tempo de início',
	'qa_end_time' => 'Tempo final',
	'qa_expense_category' => 'Categoria de Despesa',
	'qa_expense_categories' => 'Categorias de Despesa',
	'qa_expense_management' => 'Gestão de Despesa',
	'qa_expenses' => 'Despesas',
	'qa_expense' => 'Despesa',
	'qa_entry_date' => 'Data de entrada',
	'qa_amount' => 'Quantidade',
	'qa_income_categories' => 'Categorias de entrada',
	'qa_monthly_report' => 'Relatório mensal',
	'qa_companies' => 'Empresas',
	'qa_company_name' => 'Nome da empresa',
	'qa_address' => 'Endereço',
	'qa_website' => 'Website',
	'qa_contact_management' => 'Gestão de contato',
	'qa_contacts' => 'Contatos',
	'qa_company' => 'Empresa',
	'qa_first_name' => 'Primeiro nome',
	'qa_last_name' => 'Último nome',
	'qa_phone' => 'Telefone',
	'qa_phone1' => 'Telefone 1',
	'qa_phone2' => 'Telefone 2',
	'qa_skype' => 'Skype',
	'qa_photo' => 'Foto (máx. 8 MB)',
	'qa_category_name' => 'Nome da categoria',
	'qa_product_management' => 'Gestão de produtos',
	'qa_products' => 'Produtos',
	'qa_product_name' => 'Nome do produto',
	'qa_price' => 'Preço',
	'qa_tags' => 'Tags',
	'qa_tag' => 'Tag',
	'qa_photo1' => 'Foto1',
	'qa_photo2' => 'Foto2',
	'qa_photo3' => 'Foto3',
	'qa_calendar' => 'Calendário',
	'qa_statuses' => 'Status',
	'qa_task_management' => 'Gestão de tarefas',
	'qa_tasks' => 'Tarefas',
	'qa_status' => 'Estado',
	'qa_attachment' => 'Anexo',
	'qa_due_date' => 'Data de vencimento',
	'qa_assigned_to' => 'Atribuído',
	'qa_assets' => 'Ativos',
	'qa_asset' => 'Ativo',
	'qa_serial_number' => 'Número de série',
	'qa_location' => 'Local',
	'qa_locations' => 'Locais',
	'qa_assigned_user' => 'Atribuído (usuário)',
	'qa_notes' => 'Notas',
	'qa_assets_history' => 'Histórico de ativos',
	'qa_assets_management' => 'Gestão de ativos',
	'qa_content_management' => 'Gestão de conteúdo',
	'qa_text' => 'Texto',
	'qa_pages' => 'Páginas',
	'qa_axis' => 'Eixo',
	'qa_show' => 'Mostrar',
	'qa_group_by' => 'Agrupar por',
	'qa_chart_type' => 'Tipo de gráfico',
	'qa_create_new_report' => 'Criar novo relatório',
	'qa_no_reports_yet' => 'Nenhum relatório ainda.',
	'qa_created_at' => 'Criado em',
	'qa_updated_at' => 'Atualizado em',
	'qa_deleted_at' => 'Eliminado em',
	'qa_reports_x_axis_field' => 'Eixo X - por favor escolha um dos campos de data/hora',
	'qa_reports_y_axis_field' => 'Eixo Y - por favor escolha um dos campos numéricos',
	'qa_select_crud_placeholder' => 'Por favor selecione um de seus CRUDs',
	'qa_select_dt_placeholder' => 'Por favor selecione um dos campos de data/hora',
	'qa_aggregate_function_use' => 'Agregar função a utilizar',
	'qa_x_axis_group_by' => 'Eixo X agrupar por',
	'qa_x_axis_field' => 'Campo do eixo X (data/hora)',
	'qa_y_axis_field' => 'Campo do eixo Y',
	'qa_integer_float_placeholder' => 'Por favor selecione um dos campos inteiros/float',
	'qa_change_notifications_field_1_label' => 'Enviar notificação por e-mail ao Usuário',
	'qa_select_users_placeholder' => 'Por favor selecione um de seus Usuários',
	'qa_is_created' => 'foi criado',
	'qa_is_updated' => 'foi atualizado',
	'qa_is_deleted' => 'foi eliminado',
	'qa_notifications' => 'Notificações',
	'qa_notify_user' => 'Notificar usuário',
	'qa_when_crud' => 'Quando CRUD',
	'qa_create_new_notification' => 'Criar nova Notificação',
	'qa_stripe_transactions' => 'Classe de transações',
	'qa_upgrade_to_premium' => 'Atualizar para Premium',
	'qa_messages' => 'Mensagens',
	'qa_you_have_no_messages' => 'Você não possui nenhuma mensagem.',
	'qa_all_messages' => 'Todas as mensagens',
	'qa_new_message' => 'Nova mensagem',
	'qa_outbox' => 'Caixa de saída',
	'qa_inbox' => 'Caixa de entrada',
	'qa_recipient' => 'Destinatário',
	'qa_subject' => 'Assunto',
	'qa_message' => 'Mensagem',
	'qa_send' => 'Enviar',
	'qa_reply' => 'Responder',
	'qa_calendar_sources' => 'Fontes de calendário',
	'qa_new_calendar_source' => 'Criar nova fonte de calendário',
	'qa_crud_title' => 'Título do CRUD',
	'qa_crud_date_field' => 'Campo de data CRUD',
	'qa_prefix' => 'Prefixo',
	'qa_label_field' => 'Campo de rótulo',
	'qa_suffix' => 'Sufixo',
	'qa_no_calendar_sources' => 'Nenhuma fonte de calendário ainda.',
	'qa_crud_event_field' => 'Campo de rótulo do evento',
	'qa_create_new_calendar_source' => 'Criar nova Fonte de Calendário',
	'qa_edit_calendar_source' => 'Editar Fonte de Calendário',
	'qa_client_management' => 'Gestão de clientes',
	'qa_client_management_settings' => 'Configurações de Gestão de clientes',
	'qa_country' => 'País',
	'qa_client_status' => 'Estado do cliente',
	'qa_clients' => 'Clientes',
	'qa_client_statuses' => 'Estado do cliente',
	'qa_currencies' => 'Moedas',
	'qa_main_currency' => 'Moeda principal',
	'qa_documents' => 'Documentos',
	'qa_file' => 'Arquivo',
	'qa_income_source' => 'Fonte de entrada',
	'qa_income_sources' => 'Fontes de entrada',
	'qa_fee_percent' => 'Percentual de taxa',
	'qa_note_text' => 'Texto da nota',
	'qa_client' => 'Cliente',
	'qa_start_date' => 'Data de início',
	'qa_budget' => 'Orçamento',
	'qa_project_status' => 'Estado do projeto',
	'qa_project_statuses' => 'Estado do projeto',
	'qa_transactions' => 'Transações',
	'qa_transaction_types' => 'Tipos de transação',
	'qa_transaction_type' => 'Tipo de transação',
	'qa_transaction_date' => 'Data da transação',
	'qa_currency' => 'Moeda',
	'qa_current_password' => 'Senha atual',
	'qa_new_password' => 'Nova senha',
	'qa_password_confirm' => 'Confirmação da nova senha',
	'qa_dashboard_text' => 'Sessão iniciada',
	'qa_login' => 'Entrar',
	'qa_reset_password_woops' => '<strong> Ooops! </strong> Há problemas com a entrada:',
	'qa_email_line1' => 'Você está recebendo este e-mail porque nós recebemos uma solicitação de redefinição de senha para a sua conta.',
	'qa_email_line2' => 'Se você não solicitou redefinição de senha, nenhuma ação é necessária.',
	'qa_if_you_are_having_trouble' => 'Se você está tendo problemas para clicar no',
	'qa_copy_paste_url_bellow' => 'botão, copie e cole a URL abaixo no seu navegador web:',
	'qa_excerpt' => 'Resumo',
	'qa_featured_image' => 'Imagem em destaque',
	'qa_change_notifications_field_2_label' => 'Quando entrar no CRUD',
	'qa_email_regards' => 'Saudações',
	'qa_register' => 'Registar',
	'qa_registration' => 'Registo',
	'qa_not_approved_title' => 'A sua conta não está aprovada',
	'qa_not_approved_p' => 'Sua conta não foi aprovada ainda pelo administrador, por favor, aguarde e tente mais tarde.',
	'qa_there_were_problems_with_input' => 'Há problemas com a entrada',
	'qa_whoops' => 'Ops!',
	'qa_slug' => 'Slug',
	'qa_csv' => 'CSV',
	'qa_excel' => 'Excel',
	'qa_pdf' => 'PDF',
	'qa_file_contains_header_row' => 'O arquivo contém cabeçalho?',
	'qa_csvImport' => 'Importação CSV',
	'qa_csv_file_to_import' => 'Arquivo CSV para importar',
	'qa_parse_csv' => 'Analisar CSV',
	'qa_import_data' => 'Importar data',
	'qa_imported_rows_to_table' => 'Importado :rows linhas para tabela :table',
	'qa_subscription-billing' => 'Assinaturas',
	'qa_subscription-payments' => 'Pagamentos',
	'qa_basic_crm' => 'CRM Básico',
	'qa_customers' => 'Clientes',
	'qa_customer' => 'Cliente',
	'qa_select_all' => 'Selecionar tudo',
	'qa_deselect_all' => 'Cancelar seleção',
	'qa_team-management' => 'Equipes',
	'qa_team-management-singular' => 'Equipe',
	'quickadmin_title' => 'SiCBRAS - Sistema Integrado',
];