@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.funcionarios.title')</h3>
    @can('funcionario_create')
    <p>
        <a href="{{ route('admin.funcionarios.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('funcionario_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.funcionarios.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.funcionarios.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('funcionario_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('funcionario_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('funcionario_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.funcionarios.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.funcionarios.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('funcionario_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'numero_matricula', name: 'numero_matricula'},
                {data: 'nome_funcionario', name: 'nome_funcionario'},
                {data: 'nome_cargo.nome_cargo', name: 'nome_cargo.nome_cargo'},
                {data: 'nome_departamento.nome_departamento', name: 'nome_departamento.nome_departamento'},
                {data: 'nome_setor.nome_setores', name: 'nome_setor.nome_setores'},
                {data: 'instrutor', name: 'instrutor'},
                {data: 'situacao', name: 'situacao'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection