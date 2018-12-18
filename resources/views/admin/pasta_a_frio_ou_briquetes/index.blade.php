@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pasta-a-frio-ou-briquete.title')</h3>
    @can('pasta_a_frio_ou_briquete_create')
    <p>
        <a href="{{ route('admin.pasta_a_frio_ou_briquetes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('pasta_a_frio_ou_briquete_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.pasta_a_frio_ou_briquetes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.pasta_a_frio_ou_briquetes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('pasta_a_frio_ou_briquete_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('pasta_a_frio_ou_briquete_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.materia-prima')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.data')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.num-nf')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.transportadora')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.fornecedor')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.quantidade')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.entrada-acumulada')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.observacoes')</th>
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
        @can('pasta_a_frio_ou_briquete_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.pasta_a_frio_ou_briquetes.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.pasta_a_frio_ou_briquetes.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('pasta_a_frio_ou_briquete_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'materia_prima', name: 'materia_prima'},
                {data: 'data', name: 'data'},
                {data: 'num_nf', name: 'num_nf'},
                {data: 'transportadora', name: 'transportadora'},
                {data: 'fornecedor.nome_fantasia', name: 'fornecedor.nome_fantasia'},
                {data: 'quantidade', name: 'quantidade'},
                {data: 'entrada_acumulada', name: 'entrada_acumulada'},
                {data: 'observacoes', name: 'observacoes'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection