@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.coque-saida.title')</h3>
    @can('coque_saida_create')
    <p>
        <a href="{{ route('admin.coque_saidas.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('coque_saida_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.coque_saidas.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.coque_saidas.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('coque_saida_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('coque_saida_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.coque-saida.fields.data')</th>
                        <th>@lang('quickadmin.coque-saida.fields.lider')</th>
                        <th>@lang('quickadmin.coque-saida.fields.forno')</th>
                        <th>@lang('quickadmin.coque-saida.fields.saida')</th>
                        <th>@lang('quickadmin.coque-saida.fields.saida-acumulada')</th>
                        <th>@lang('quickadmin.coque-saida.fields.observacao')</th>
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
        @can('coque_saida_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.coque_saidas.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.coque_saidas.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('coque_saida_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'data', name: 'data'},
                {data: 'lider', name: 'lider'},
                {data: 'forno', name: 'forno'},
                {data: 'saida', name: 'saida'},
                {data: 'saida_acumulada', name: 'saida_acumulada'},
                {data: 'observacao', name: 'observacao'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection