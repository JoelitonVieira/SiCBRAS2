@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <h3>{{ $total_aberta }}</h3>
           
              <p>Turmas Abertas</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder-open-o" aria-hidden="true"></i>
            </div>
            <a href="treinamentos" class="small-box-footer">Veja Mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $total_planejada }}</h3>

              <p>Turmas Planejadas</p>
            </div>
            <div class="icon">
               <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
            <a href="treinamentos" class="small-box-footer">Veja Mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
     <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $total_concluida }}</h3>

              <p>Turmas Concluídas</p>
            </div>
            <div class="icon">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <a href="treinamentos" class="small-box-footer">Veja Mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    

    
</div>
<div class="row">
<div class="col-md-6">
            <div class="panel panel-default">
              
                <div class="panel-heading" align="center"><strong>Turmas Abertas</strong></div>
               

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            <th><center> @lang('Nome do Treinamento')</th> 
                            <th><center> @lang('Data de Inicio')</th> 
                            <th><center> @lang('Data de Conclusão ')</th> 
                            
                            <th><center>Ações</th>
                        </tr>

                        </thead>

                        @foreach($treinamentos as $treinamento)
                        @foreach($turmas as $turma)
                          <!-- @if($treinamento->situacao_turma == "Aberta") -->
                            <tr>
                                
                                <td><center>{{ $turma->nome_treinamento }} </td>
                                <td><center>{{ $treinamento->data_inicio }} </td> 
                                <td><center>{{ $treinamento->data_conclusao }} </td> 
                                
                                <td><center>

                                    @can('treinamento_view')
                                    <a href="{{ route('admin.treinamentos.show',[$treinamento->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                </td>
                            </tr>
                       <!-- @endif -->
                        @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
</div>
<div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><strong>Turmas Planejadas</strong></div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            <th><center> @lang('Nome do Treinamento')</th> 
                            <th><center> @lang('Data de Inicio')</th> 
                            <th><center> @lang('Data de Conclusão ')</th> 
                            
                            <th><center>Ações</th>
                        </tr>
                        </thead>
                        @foreach($treinamentos as $treinamento)
                            @if($treinamento->situacao_turma == "Planejada")
                            <tr>
                                
                                <td><center> ? </td>
                                <td><center>{{ $treinamento->data_inicio }} </td> 
                                <td><center>{{ $treinamento->data_conclusao }} </td> 
                                
                                <td><center>

                                    @can('treinamento_view')
                                    <a href="{{ route('admin.treinamentos.show',[$treinamento->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
</div>
</div>        


@endsection