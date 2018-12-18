@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.grafite.title')</h3>
    @can('grafite_create')
    <p>
        <a href="{{ route('admin.grafites.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('grafite_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.grafites.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.grafites.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('grafite_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('grafite_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.grafite.fields.data')</th>
                        <th>@lang('quickadmin.grafite.fields.nota-fiscal')</th>
                        <th>@lang('quickadmin.grafite.fields.transportadora')</th>
                        <th>@lang('quickadmin.grafite.fields.fornecedor')</th>
                        <th>@lang('quickadmin.grafite.fields.forno')</th>
                        <th>@lang('quickadmin.grafite.fields.operacao')</th>
                        <th>@lang('quickadmin.grafite.fields.quantidade')</th>
                        <th>@lang('quickadmin.grafite.fields.umidade')</th>
                        <th>@lang('quickadmin.grafite.fields.quantidade-real')</th>
                        <th>@lang('quickadmin.grafite.fields.entrada-acumulada')</th>
                        <th>@lang('quickadmin.grafite.fields.observacoes')</th>
                        <th>@lang('quickadmin.grafite.fields.quantidade-bags')</th>
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
        @can('grafite_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.grafites.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.grafites.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('grafite_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'data', name: 'data'},
                {data: 'nota_fiscal', name: 'nota_fiscal'},
                {data: 'transportadora', name: 'transportadora'},
                {data: 'fornecedor.nome_fantasia', name: 'fornecedor.nome_fantasia'},
                {data: 'forno', name: 'forno'},
                {data: 'operacao', name: 'operacao'},
                {data: 'quantidade', name: 'quantidade'},
                {data: 'umidade', name: 'umidade'},
                {data: 'quantidade_real', name: 'quantidade_real'},
                {data: 'entrada_acumulada', name: 'entrada_acumulada'},
                {data: 'observacoes', name: 'observacoes'},
                {data: 'quantidade_bags', name: 'quantidade_bags'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection