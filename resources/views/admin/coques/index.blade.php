@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.coque.title')</h3>
    @can('coque_create')
    <p>
        <a href="{{ route('admin.coques.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('coque_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.coques.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.coques.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('coque_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('coque_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.coque.fields.data-recebimento')</th>
                        <th>@lang('quickadmin.coque.fields.data-expedicao')</th>
                        <th>@lang('quickadmin.coque.fields.transportadora')</th>
                        <th>@lang('quickadmin.coque.fields.fornecedor')</th>
                        <th>@lang('quickadmin.coque.fields.nota-fiscal')</th>
                        <th>@lang('quickadmin.coque.fields.cte')</th>
                        <th>@lang('quickadmin.coque.fields.peso-nf')</th>
                        <th>@lang('quickadmin.coque.fields.peso-sicbras')</th>
                        <th>@lang('quickadmin.coque.fields.diferenca')</th>
                        <th>@lang('quickadmin.coque.fields.rs-acordo')</th>
                        <th>@lang('quickadmin.coque.fields.cambio')</th>
                        <th>@lang('quickadmin.coque.fields.dolar-acordo')</th>
                        <th>@lang('quickadmin.coque.fields.valor-nota')</th>
                        <th>@lang('quickadmin.coque.fields.rs-real-imposto')</th>
                        <th>@lang('quickadmin.coque.fields.icms')</th>
                        <th>@lang('quickadmin.coque.fields.pis-confins')</th>
                        <th>@lang('quickadmin.coque.fields.ipi')</th>
                        <th>@lang('quickadmin.coque.fields.encargo-30')</th>
                        <th>@lang('quickadmin.coque.fields.rs-real-semimposto')</th>
                        <th>@lang('quickadmin.coque.fields.dolar-sem-imposto')</th>
                        <th>@lang('quickadmin.coque.fields.valor-frete')</th>
                        <th>@lang('quickadmin.coque.fields.rs-frete')</th>
                        <th>@lang('quickadmin.coque.fields.saldo-retirar')</th>
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
        @can('coque_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.coques.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.coques.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('coque_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'data_recebimento', name: 'data_recebimento'},
                {data: 'data_expedicao', name: 'data_expedicao'},
                {data: 'transportadora', name: 'transportadora'},
                {data: 'fornecedor.nome_fantasia', name: 'fornecedor.nome_fantasia'},
                {data: 'nota_fiscal', name: 'nota_fiscal'},
                {data: 'cte', name: 'cte'},
                {data: 'peso_nf', name: 'peso_nf'},
                {data: 'peso_sicbras', name: 'peso_sicbras'},
                {data: 'diferenca', name: 'diferenca'},
                {data: 'rs_acordo', name: 'rs_acordo'},
                {data: 'cambio', name: 'cambio'},
                {data: 'dolar_acordo', name: 'dolar_acordo'},
                {data: 'valor_nota', name: 'valor_nota'},
                {data: 'rs_real_imposto', name: 'rs_real_imposto'},
                {data: 'icms', name: 'icms'},
                {data: 'pis_confins', name: 'pis_confins'},
                {data: 'ipi', name: 'ipi'},
                {data: 'encargo_30', name: 'encargo_30'},
                {data: 'rs_real_semimposto', name: 'rs_real_semimposto'},
                {data: 'dolar_sem_imposto', name: 'dolar_sem_imposto'},
                {data: 'valor_frete', name: 'valor_frete'},
                {data: 'rs_frete', name: 'rs_frete'},
                {data: 'saldo_retirar', name: 'saldo_retirar'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection