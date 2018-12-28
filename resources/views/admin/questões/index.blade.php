@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <h3>FAQ</h3>
           
              <p>Precisando de ajuda?</p>
            </div>
            <div class="icon">
              <i class="fa fa-question" aria-hidden="true"></i>
            </div>
           
          </div>
    </div>

<div class="row">
    <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> Dúvidas frequentes sobre o módulo de treinamento:</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                        Item #1 — Painel
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                     <p>
                          No painel trazemos informações sobre as turmas.
                     </p> 
                            
                            <p>No topo da tela, os quadros informam o total de Turmas Abertas, Planejadas e Concluídas.  <br>
                             Toda adição ou edição de uma nova turma irá refletir aqui. <br>

                             Clicando em <em><strong>Ver mais</em></strong> você será redirecionado para a tabela de turmas do sistema.</p>

                     <p>
                          Ainda no painel é possível ver alguns registros das turmas que estão com situação Aberta e Planejada, como o nome do treinamento, a data de início e a data de conclusão. <br>Clicando em <em><strong>Ações</em>    </strong>, o sistema mostrará todos os dados da turma selecionada.


                     </p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                        Item #2 — Controle de Treinamento
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">

                      <p>Nesse item do menu serão feitos os cadastros das turmas.</p>
                      Clicando em turmas, uma tabela será exibida com todos os registros cadastrados, caso não exista nenhum cadastro, o sistema informará que a tabela está vazia. <br>

                      <p>Para cadastrar uma nova turma clique no botão <em><strong>Novo</em></strong>. Em seguida será exibido na tela um formulário com os campos a serem preenchidos.</p>

                      <p><em>OBS: Os campos marcados com * são de preenchimento obrigatórios.</em></p>

                      <p>Após o preenchimento do formulário, você será redirecionado para a tabela de turmas onde poderá visualizar os dados que acabou de criar.</p>

                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                        Item #3 — Gerenciar Itens
                      </a>

                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                      <p>Nessa sessão trazemos todas as outras tabelas do módulo de 
                      treinamento.</p>

                      <p>Clicando no menu <strong><em>Gerenciar itens</em></strong>, você terá essas opções de cadastro.</p>
        
                          <ol>
                            
                                <li>Cargos - Selecione para adicionar, editar ou excluir um cargo.</li>
                                <li>Setores - Selecione para adicionar, editar ou excluir um setor.</li>
                                <li>Funcionários - Selecione para adicionar, editar ou excluir um funcionário.</li>
                                <li>Treinamento - Selecione para adicionar, editar ou excluir um treinamento.</li>
                                <li>Departamentos - Selecione para adicionar, editar ou excluir um departamento.</li>
                                <li>Tipo de Treinamento - Selecione para adicionar, editar ou excluir um tipo de treinamento. </li>
                                <li>Espec. de Treinamento - Selecione para adicionar, editar ou excluir uma especificação de treinamento.</li>

                          </ol>

                    </div>
                  </div>
                </div>

                <!-- Aqui começa --> 

              <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed" aria-expanded="false">
                        Item #4 — Gerenciador de Arquivos
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">


                   <p>O gerenciador de arquivos permite ao usuário importar os documentos salvos no pc para sistema.</p>
                      
                      <p> Acesse o menu Gerenciador de Arquivos >> Incluir/Listar Arquivos.</p>

                      <p> Para incluir um novo documento ao sistema clique no botão <strong><em>Novo</em></strong>. Um formulário será habilitado para que você possa definir o nome e selecionar qual será o arquivo.</p>

                      <p>Formatos e tamanhos válidos</p>

                      <ol>
                        
                          <li>.xls -- (Excel) até 1.024MB</li>
                          <li>.doc -- (Word) até 1.024MB</li>
                          <li>.pdf -- (PDF) até 1.024MB</li>
                          <li>.jpg ou .png -- (Imagem) até 1.024MB</li>       

                      </ol>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
@endsection