@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.setores.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.setores.fields.nome-setores')</th>
                            <td field-key='nome_setores'>{{ $setore->nome_setores }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#treinamento" aria-controls="treinamento" role="tab" data-toggle="tab">Turmas</a></li>
<li role="presentation" class=""><a href="#funcionarios" aria-controls="funcionarios" role="tab" data-toggle="tab">Funcionários</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="treinamento">
<table class="table table-bordered table-striped {{ count($treinamentos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.treinamento.fields.nome-treinamento')</th>
                        <th>@lang('quickadmin.treinamento.fields.carga-horaria')</th>
                        <th>@lang('quickadmin.treinamento.fields.nome-setores')</th>
                        <th>@lang('quickadmin.treinamento.fields.data-inicio')</th>
                        <th>@lang('quickadmin.treinamento.fields.data-conclusao')</th>
                        <th>@lang('quickadmin.treinamento.fields.validadade')</th>
                        <th>@lang('quickadmin.treinamento.fields.reciclagem')</th>
                        <th>@lang('quickadmin.treinamento.fields.situacao-turma')</th>
                        <th>@lang('quickadmin.treinamento.fields.localidade')</th>
                        <th>@lang('quickadmin.treinamento.fields.disponibilidade')</th>
                        <th>@lang('quickadmin.treinamento.fields.instrutor')</th>
                        <th>@lang('quickadmin.treinamento.fields.nome-participantes')</th>
                        <th>@lang('quickadmin.treinamento.fields.tipo-treinamento')</th>
                        <th>@lang('quickadmin.treinamento.fields.espec-treinamento')</th>
                        <th>@lang('quickadmin.treinamento.fields.horas')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($treinamentos) > 0)
            @foreach ($treinamentos as $treinamento)
                <tr data-entry-id="{{ $treinamento->id }}">
                    <td field-key='nome_treinamento'>{{ $treinamento->nome_treinamento->nome_treinamento or '' }}</td>
                                <td field-key='carga_horaria'>{{ $treinamento->carga_horaria }}</td>
                                <td field-key='nome_setores'>{{ $treinamento->nome_setores->nome_setores or '' }}</td>
                                <td field-key='data_inicio'>{{ $treinamento->data_inicio }}</td>
                                <td field-key='data_conclusao'>{{ $treinamento->data_conclusao }}</td>
                                <td field-key='validadade'>{{ $treinamento->validadade }}</td>
                                <td field-key='reciclagem'>{{ $treinamento->reciclagem }}</td>
                                <td field-key='situacao_turma'>{{ $treinamento->situacao_turma }}</td>
                                <td field-key='localidade'>{{ $treinamento->localidade }}</td>
                                <td field-key='disponibilidade'>{{ $treinamento->disponibilidade }}</td>
                                <td field-key='instrutor'>{{ $treinamento->instrutor->nome_funcionario or '' }}</td>
                                <td field-key='nome_participantes'>
                                    @foreach ($treinamento->nome_participantes as $singleNomeParticipantes)
                                        <span class="label label-info label-many">{{ $singleNomeParticipantes->nome_funcionario }}</span>
                                    @endforeach
                                </td>
                                <td field-key='tipo_treinamento'>{{ $treinamento->tipo_treinamento->nome_tipo_treinamento or '' }}</td>
                                <td field-key='espec_treinamento'>{{ $treinamento->espec_treinamento->nome_espectreinamento or '' }}</td>
                                <td field-key='horas'>{{ $treinamento->horas }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('treinamento_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.treinamentos.restore', $treinamento->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('treinamento_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.treinamentos.perma_del', $treinamento->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('treinamento_view')
                                    <a href="{{ route('admin.treinamentos.show',[$treinamento->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('treinamento_edit')
                                    <a href="{{ route('admin.treinamentos.edit',[$treinamento->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('treinamento_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.treinamentos.destroy', $treinamento->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="20">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="funcionarios">
<table class="table table-bordered table-striped {{ count($funcionarios) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.funcionarios.fields.numero-matricula')</th>
                        <th>@lang('quickadmin.funcionarios.fields.nome-funcionario')</th>
                        <th>@lang('quickadmin.funcionarios.fields.nome-cargo')</th>
                        <th>@lang('quickadmin.funcionarios.fields.nome-departamento')</th>
                        <th>@lang('quickadmin.funcionarios.fields.nome-setor')</th>
                        <th>@lang('quickadmin.funcionarios.fields.instrutor')</th>
                        <th>@lang('quickadmin.funcionarios.fields.situacao')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($funcionarios) > 0)
            @foreach ($funcionarios as $funcionario)
                <tr data-entry-id="{{ $funcionario->id }}">
                    <td field-key='numero_matricula'>{{ $funcionario->numero_matricula }}</td>
                                <td field-key='nome_funcionario'>{{ $funcionario->nome_funcionario }}</td>
                                <td field-key='nome_cargo'>{{ $funcionario->nome_cargo->nome_cargo or '' }}</td>
                                <td field-key='nome_departamento'>{{ $funcionario->nome_departamento->nome_departamento or '' }}</td>
                                <td field-key='nome_setor'>{{ $funcionario->nome_setor->nome_setores or '' }}</td>
                                <td field-key='instrutor'>{{ $funcionario->instrutor }}</td>
                                <td field-key='situacao'>{{ $funcionario->situacao }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('funcionario_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.funcionarios.restore', $funcionario->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('funcionario_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.funcionarios.perma_del', $funcionario->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('funcionario_view')
                                    <a href="{{ route('admin.funcionarios.show',[$funcionario->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('funcionario_edit')
                                    <a href="{{ route('admin.funcionarios.edit',[$funcionario->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('funcionario_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.funcionarios.destroy', $funcionario->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.setores.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


