@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.especificacao.title')</h3>
    @can('especificacao_create')
    <p>
        <a href="{{ route('admin.especificacaos.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('especificacao_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.especificacaos.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.especificacaos.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('especificacao_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('especificacao_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.especificacao.fields.codigo')</th>
                        <th>@lang('quickadmin.especificacao.fields.data')</th>
                        <th>@lang('quickadmin.especificacao.fields.requisito-iso')</th>
                        <th>@lang('quickadmin.especificacao.fields.nome-cliente')</th>
                        <th>@lang('quickadmin.especificacao.fields.cd-produto')</th>
                        <th>@lang('quickadmin.produtos.fields.produto')</th>
                        <th>@lang('quickadmin.produtos.fields.granulometria')</th>
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
        @can('especificacao_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.especificacaos.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.especificacaos.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('especificacao_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'codigo', name: 'codigo'},
                {data: 'data', name: 'data'},
                {data: 'requisito_iso', name: 'requisito_iso'},
                {data: 'nome_cliente.nome_cliente', name: 'nome_cliente.nome_cliente'},
                {data: 'cd_produto.codigo', name: 'cd_produto.codigo'},
                {data: 'cd_produto.produto', name: 'cd_produto.produto'},
                {data: 'cd_produto.granulometria', name: 'cd_produto.granulometria'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection