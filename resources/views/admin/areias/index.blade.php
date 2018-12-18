@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.areia.title')</h3>
    @can('areium_create')
    <p>
        <a href="{{ route('admin.areias.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('areium_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.areias.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.areias.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('areium_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('areium_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.areia.fields.data')</th>
                        <th>@lang('quickadmin.areia.fields.fornecedor')</th>
                        <th>@lang('quickadmin.areia.fields.num-nf')</th>
                        <th>@lang('quickadmin.areia.fields.cte')</th>
                        <th>@lang('quickadmin.areia.fields.peso-nf')</th>
                        <th>@lang('quickadmin.areia.fields.peso-sicbras')</th>
                        <th>@lang('quickadmin.areia.fields.diferenca')</th>
                        <th>@lang('quickadmin.areia.fields.valor-prod')</th>
                        <th>@lang('quickadmin.areia.fields.valor-frete')</th>
                        <th>@lang('quickadmin.areia.fields.rs-areia')</th>
                        <th>@lang('quickadmin.areia.fields.rs-frete')</th>
                        <th>@lang('quickadmin.areia.fields.saldo-retirar')</th>
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
        @can('areium_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.areias.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.areias.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('areium_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'data', name: 'data'},
                {data: 'fornecedor.nome_fantasia', name: 'fornecedor.nome_fantasia'},
                {data: 'num_nf', name: 'num_nf'},
                {data: 'cte', name: 'cte'},
                {data: 'peso_nf', name: 'peso_nf'},
                {data: 'peso_sicbras', name: 'peso_sicbras'},
                {data: 'diferenca', name: 'diferenca'},
                {data: 'valor_prod', name: 'valor_prod'},
                {data: 'valor_frete', name: 'valor_frete'},
                {data: 'rs_areia', name: 'rs_areia'},
                {data: 'rs_frete', name: 'rs_frete'},
                {data: 'saldo_retirar', name: 'saldo_retirar'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection