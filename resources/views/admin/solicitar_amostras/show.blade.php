@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.solicitar-amostra.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.setor')</th>
                            <td field-key='setor'>{{ $solicitar_amostra->setor }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.data')</th>
                            <td field-key='data'>{{ $solicitar_amostra->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.equipamento')</th>
                            <td field-key='equipamento'>{{ $solicitar_amostra->equipamento }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.amostra')</th>
                            <td field-key='amostra'>{{ $solicitar_amostra->amostra }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.responsavel')</th>
                            <td field-key='responsavel'>{{ $solicitar_amostra->responsavel }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.referencia')</th>
                            <td field-key='referencia'>{{ $solicitar_amostra->referencia }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.alimentacao')</th>
                            <td field-key='alimentacao'>{{ $solicitar_amostra->alimentacao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.od-producao')</th>
                            <td field-key='od_producao'>{{ $solicitar_amostra->od_producao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.bag-pallet')</th>
                            <td field-key='bag_pallet'>{{ $solicitar_amostra->bag_pallet }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.peso')</th>
                            <td field-key='peso'>{{ $solicitar_amostra->peso }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitar-amostra.fields.cd-especificacao')</th>
                            <td field-key='cd_especificacao'>{{ $solicitar_amostra->cd_especificacao->codigo or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#analise_quimica" aria-controls="analise_quimica" role="tab" data-toggle="tab">Analise Química  </a></li>
<li role="presentation" class=""><a href="#analise_granulometrica" aria-controls="analise_granulometrica" role="tab" data-toggle="tab">Analise Granulométrica</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="analise_quimica">
<table class="table table-bordered table-striped {{ count($analise_quimicas) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.analise-quimica.fields.material')</th>
                        <th>@lang('quickadmin.analise-quimica.fields.nu-analise')</th>
                        <th>@lang('quickadmin.analise-quimica.fields.data')</th>
                        <th>@lang('quickadmin.analise-quimica.fields.fk-solicitar-amostra')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($analise_quimicas) > 0)
            @foreach ($analise_quimicas as $analise_quimica)
                <tr data-entry-id="{{ $analise_quimica->id }}">
                    <td field-key='material'>{{ $analise_quimica->material }}</td>
                                <td field-key='nu_analise'>{{ $analise_quimica->nu_analise }}</td>
                                <td field-key='data'>{{ $analise_quimica->data }}</td>
                                <td field-key='fk_solicitar_amostra'>{{ $analise_quimica->fk_solicitar_amostra->od_producao or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('analise_quimica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.analise_quimicas.restore', $analise_quimica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('analise_quimica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.analise_quimicas.perma_del', $analise_quimica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('analise_quimica_view')
                                    <a href="{{ route('admin.analise_quimicas.show',[$analise_quimica->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('analise_quimica_edit')
                                    <a href="{{ route('admin.analise_quimicas.edit',[$analise_quimica->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('analise_quimica_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.analise_quimicas.destroy', $analise_quimica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="analise_granulometrica">
<table class="table table-bordered table-striped {{ count($analise_granulometricas) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

    <tbody>
        @if (count($analise_granulometricas) > 0)
            @foreach ($analise_granulometricas as $analise_granulometrica)
                <tr data-entry-id="{{ $analise_granulometrica->id }}">
                    <td field-key='resultados_penr'>{{ $analise_granulometrica->resultados_penr }}</td>
                                <td field-key='data'>{{ $analise_granulometrica->data }}</td>
                                <td field-key='status'>{{ $analise_granulometrica->status }}</td>
                                <td field-key='destino'>{{ $analise_granulometrica->destino_address }}</td>
                                <td field-key='fk_solicitar_amostrar'>{{ $analise_granulometrica->fk_solicitar_amostrar->od_producao or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('analise_granulometrica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.analise_granulometricas.restore', $analise_granulometrica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('analise_granulometrica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.analise_granulometricas.perma_del', $analise_granulometrica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('analise_granulometrica_view')
                                    <a href="{{ route('admin.analise_granulometricas.show',[$analise_granulometrica->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('analise_granulometrica_edit')
                                    <a href="{{ route('admin.analise_granulometricas.edit',[$analise_granulometrica->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('analise_granulometrica_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.analise_granulometricas.destroy', $analise_granulometrica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.solicitar_amostras.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop
