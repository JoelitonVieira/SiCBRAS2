@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.solicitacao-de-analise.title')</h3>
    @can('solicitacao_de_analise_create')
    <p>
        <a href="{{ route('admin.solicitacao_de_analises.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('solicitacao_de_analise_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.solicitacao_de_analises.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.solicitacao_de_analises.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('solicitacao_de_analise_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('solicitacao_de_analise_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.solicitacao-de-analise.fields.turnos')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.nome-resp-amostragem')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.mat-primas')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.lote-ano')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.tipos-graf')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.n-op')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.fornecedor')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.origem')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.tipos-de-misturas')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.numero-operacao')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.fornos-das-misturas')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.amostra-teste')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.material')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.identificacao-da-amostra')</th>
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
        @can('solicitacao_de_analise_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.solicitacao_de_analises.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.solicitacao_de_analises.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('solicitacao_de_analise_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'turnos', name: 'turnos'},
                {data: 'nome_resp_amostragem', name: 'nome_resp_amostragem'},
                {data: 'mat_primas', name: 'mat_primas'},
                {data: 'lote_ano', name: 'lote_ano'},
                {data: 'tipos_graf', name: 'tipos_graf'},
                {data: 'n_op', name: 'n_op'},
                {data: 'fornecedor.nome_fantasia', name: 'fornecedor.nome_fantasia'},
                {data: 'origem', name: 'origem'},
                {data: 'tipos_de_misturas', name: 'tipos_de_misturas'},
                {data: 'numero_operacao', name: 'numero_operacao'},
                {data: 'fornos_das_misturas', name: 'fornos_das_misturas'},
                {data: 'amostra_teste', name: 'amostra_teste'},
                {data: 'material', name: 'material'},
                {data: 'identificacao_da_amostra', name: 'identificacao_da_amostra'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection