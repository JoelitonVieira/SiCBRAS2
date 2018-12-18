@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.treinamento.title')</h3>
    @can('treinamento_create')
    <p>
        <a href="{{ route('admin.treinamentos.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('treinamento_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.treinamentos.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.treinamentos.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('treinamento_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('treinamento_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('treinamento_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.treinamentos.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.treinamentos.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('treinamento_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'nome_treinamento.nome_treinamento', name: 'nome_treinamento.nome_treinamento'},
                {data: 'carga_horaria', name: 'carga_horaria'},
                {data: 'nome_setores.nome_setores', name: 'nome_setores.nome_setores'},
                {data: 'data_inicio', name: 'data_inicio'},
                {data: 'data_conclusao', name: 'data_conclusao'},
                {data: 'validadade', name: 'validadade'},
                {data: 'reciclagem', name: 'reciclagem'},
                {data: 'situacao_turma', name: 'situacao_turma'},
                {data: 'localidade', name: 'localidade'},
                {data: 'disponibilidade', name: 'disponibilidade'},
                {data: 'instrutor.nome_funcionario', name: 'instrutor.nome_funcionario'},
                {data: 'nome_participantes.nome_funcionario', name: 'nome_participantes.nome_funcionario'},
                {data: 'tipo_treinamento.nome_tipo_treinamento', name: 'tipo_treinamento.nome_tipo_treinamento'},
                {data: 'espec_treinamento.nome_espectreinamento', name: 'espec_treinamento.nome_espectreinamento'},
                {data: 'horas', name: 'horas'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection