@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.analise-granulometrica.title')</h3>
    @can('analise_granulometrica_create')
    <p>
        <a href="{{ route('admin.analise_granulometricas.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('analise_granulometrica_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.analise_granulometricas.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.analise_granulometricas.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('analise_granulometrica_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('analise_granulometrica_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.analise-granulometrica.fields.resultados-penr')</th>
                        <th>@lang('quickadmin.analise-granulometrica.fields.data')</th>
                        <th>@lang('quickadmin.analise-granulometrica.fields.status')</th>
                        <th>@lang('quickadmin.analise-granulometrica.fields.destino')</th>
                        <th>@lang('quickadmin.analise-granulometrica.fields.fk-solicitar-amostrar')</th>
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
        @can('analise_granulometrica_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.analise_granulometricas.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.analise_granulometricas.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('analise_granulometrica_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'resultados_penr', name: 'resultados_penr'},
                {data: 'data', name: 'data'},
                {data: 'status', name: 'status'},
                {data: 'destino_address', name: 'destino_address'},
                {data: 'fk_solicitar_amostrar.od_producao', name: 'fk_solicitar_amostrar.od_producao'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection