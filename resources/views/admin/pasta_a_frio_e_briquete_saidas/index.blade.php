@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pasta-a-frio-e-briquete-saida.title')</h3>
    @can('pasta_a_frio_e_briquete_saida_create')
    <p>
        <a href="{{ route('admin.pasta_a_frio_e_briquete_saidas.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('pasta_a_frio_e_briquete_saida_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.pasta_a_frio_e_briquete_saidas.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.pasta_a_frio_e_briquete_saidas.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('pasta_a_frio_e_briquete_saida_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('pasta_a_frio_e_briquete_saida_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.materia-prima')</th>
                        <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.data')</th>
                        <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.lider-saida')</th>
                        <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.forno-saida')</th>
                        <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.operacao')</th>
                        <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.saida')</th>
                        <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.saida-acumulada')</th>
                        <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.observacoes')</th>
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
        @can('pasta_a_frio_e_briquete_saida_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.pasta_a_frio_e_briquete_saidas.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.pasta_a_frio_e_briquete_saidas.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('pasta_a_frio_e_briquete_saida_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'materia_prima', name: 'materia_prima'},
                {data: 'data', name: 'data'},
                {data: 'lider_saida', name: 'lider_saida'},
                {data: 'forno_saida', name: 'forno_saida'},
                {data: 'operacao', name: 'operacao'},
                {data: 'saida', name: 'saida'},
                {data: 'saida_acumulada', name: 'saida_acumulada'},
                {data: 'observacoes', name: 'observacoes'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection