@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.mistura-nova.title')</h3>
    @can('mistura_nova_create')
    <p>
        <a href="{{ route('admin.mistura_novas.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('mistura_nova_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.mistura_novas.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.mistura_novas.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('mistura_nova_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('mistura_nova_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.mistura-nova.fields.data')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.numero-cf')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.numero-kf')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.kg-coquebase')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.kg-areiabase')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.kg-coquereal')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.kg-areiareal')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.mediacoque')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.mediaareia')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.num-batelada')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.turnos')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.coque-total')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.areia-total')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.total-batelada')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.total-misturadia')</th>
                        <th>@lang('quickadmin.mistura-nova.fields.mistura-total')</th>
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
        @can('mistura_nova_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.mistura_novas.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.mistura_novas.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('mistura_nova_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'data', name: 'data'},
                {data: 'numero_cf', name: 'numero_cf'},
                {data: 'numero_kf', name: 'numero_kf'},
                {data: 'kg_coquebase', name: 'kg_coquebase'},
                {data: 'kg_areiabase', name: 'kg_areiabase'},
                {data: 'kg_coquereal', name: 'kg_coquereal'},
                {data: 'kg_areiareal', name: 'kg_areiareal'},
                {data: 'mediacoque', name: 'mediacoque'},
                {data: 'mediaareia', name: 'mediaareia'},
                {data: 'num_batelada', name: 'num_batelada'},
                {data: 'turnos', name: 'turnos'},
                {data: 'coque_total', name: 'coque_total'},
                {data: 'areia_total', name: 'areia_total'},
                {data: 'total_batelada', name: 'total_batelada'},
                {data: 'total_misturadia', name: 'total_misturadia'},
                {data: 'mistura_total', name: 'mistura_total'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection