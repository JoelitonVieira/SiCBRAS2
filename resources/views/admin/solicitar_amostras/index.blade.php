@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.solicitar-amostra.title')</h3>
    @can('solicitar_amostra_create')
    <p>
        <a href="{{ route('admin.solicitar_amostras.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('solicitar_amostra_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.solicitar_amostras.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.solicitar_amostras.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('solicitar_amostra_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('solicitar_amostra_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.solicitar-amostra.fields.setor')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.data')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.equipamento')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.amostra')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.responsavel')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.referencia')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.alimentacao')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.od-producao')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.bag-pallet')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.peso')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.cd-especificacao')</th>
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
        @can('solicitar_amostra_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.solicitar_amostras.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.solicitar_amostras.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('solicitar_amostra_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'setor', name: 'setor'},
                {data: 'data', name: 'data'},
                {data: 'equipamento', name: 'equipamento'},
                {data: 'amostra', name: 'amostra'},
                {data: 'responsavel', name: 'responsavel'},
                {data: 'referencia', name: 'referencia'},
                {data: 'alimentacao', name: 'alimentacao'},
                {data: 'od_producao', name: 'od_producao'},
                {data: 'bag_pallet', name: 'bag_pallet'},
                {data: 'peso', name: 'peso'},
                {data: 'cd_especificacao.codigo', name: 'cd_especificacao.codigo'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection