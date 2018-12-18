@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.resultados-quimicos.title')</h3>
    @can('resultados_quimico_create')
    <p>
        <a href="{{ route('admin.resultados_quimicos.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('resultados_quimico_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.resultados_quimicos.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.resultados_quimicos.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('resultados_quimico_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('resultados_quimico_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.resultados-quimicos.fields.data')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.op-forno')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.quantidade')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.numeracao')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.sic-flourizado')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.sic')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.ppc')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.c-reagido')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.si-reagido')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.si-livre')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.sio2')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.si-sio2')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.fe2o3')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.al2o3')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.cao')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.mgo')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.observa')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.status')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.n-analis')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.c-livgre')</th>
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
        @can('resultados_quimico_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.resultados_quimicos.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.resultados_quimicos.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('resultados_quimico_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'data', name: 'data'},
                {data: 'op_forno', name: 'op_forno'},
                {data: 'quantidade', name: 'quantidade'},
                {data: 'numeracao', name: 'numeracao'},
                {data: 'sic_flourizado', name: 'sic_flourizado'},
                {data: 'sic', name: 'sic'},
                {data: 'ppc', name: 'ppc'},
                {data: 'c_reagido', name: 'c_reagido'},
                {data: 'si_reagido', name: 'si_reagido'},
                {data: 'si_livre', name: 'si_livre'},
                {data: 'sio2', name: 'sio2'},
                {data: 'si_sio2', name: 'si_sio2'},
                {data: 'fe2o3', name: 'fe2o3'},
                {data: 'al2o3', name: 'al2o3'},
                {data: 'cao', name: 'cao'},
                {data: 'mgo', name: 'mgo'},
                {data: 'observa', name: 'observa'},
                {data: 'status', name: 'status'},
                {data: 'n_analis.nu_analise', name: 'n_analis.nu_analise'},
                {data: 'c_livgre', name: 'c_livgre'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection