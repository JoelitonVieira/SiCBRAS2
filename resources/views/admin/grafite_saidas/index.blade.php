@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.grafite-saida.title')</h3>
    @can('grafite_saida_create')
    <p>
        <a href="{{ route('admin.grafite_saidas.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('grafite_saida_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.grafite_saidas.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.grafite_saidas.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('grafite_saida_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('grafite_saida_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.grafite-saida.fields.data')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.nome-lider')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.forno')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.operacao')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.saida')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.umidade')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.quantidade-real')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.saida-acumulada')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.observacoes')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.quantidade-bags')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.fornecedor')</th>
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
        @can('grafite_saida_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.grafite_saidas.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.grafite_saidas.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('grafite_saida_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'data', name: 'data'},
                {data: 'nome_lider', name: 'nome_lider'},
                {data: 'forno', name: 'forno'},
                {data: 'operacao', name: 'operacao'},
                {data: 'saida', name: 'saida'},
                {data: 'umidade', name: 'umidade'},
                {data: 'quantidade_real', name: 'quantidade_real'},
                {data: 'saida_acumulada', name: 'saida_acumulada'},
                {data: 'observacoes', name: 'observacoes'},
                {data: 'quantidade_bags', name: 'quantidade_bags'},
                {data: 'fornecedor.nome_fantasia', name: 'fornecedor.nome_fantasia'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection