@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.analise-quimica.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.analise-quimica.fields.material')</th>
                            <td field-key='material'>{{ $analise_quimica->material }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.analise-quimica.fields.nu-analise')</th>
                            <td field-key='nu_analise'>{{ $analise_quimica->nu_analise }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.analise-quimica.fields.data')</th>
                            <td field-key='data'>{{ $analise_quimica->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.analise-quimica.fields.fk-solicitar-amostra')</th>
                            <td field-key='fk_solicitar_amostra'>{{ $analise_quimica->fk_solicitar_amostra->od_producao or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#resultados_quimicos" aria-controls="resultados_quimicos" role="tab" data-toggle="tab">Resultados Químicos</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="resultados_quimicos">
<table class="table table-bordered table-striped {{ count($resultados_quimicos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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
                        <th>@lang('quickadmin.resultados-quimicos.fields.c-livgre')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($resultados_quimicos) > 0)
            @foreach ($resultados_quimicos as $resultados_quimico)
                <tr data-entry-id="{{ $resultados_quimico->id }}">
                    <td field-key='data'>{{ $resultados_quimico->data }}</td>
                                <td field-key='op_forno'>{{ $resultados_quimico->op_forno }}</td>
                                <td field-key='quantidade'>{{ $resultados_quimico->quantidade }}</td>
                                <td field-key='numeracao'>{{ $resultados_quimico->numeracao }}</td>
                                <td field-key='sic_flourizado'>{{ $resultados_quimico->sic_flourizado }}</td>
                                <td field-key='sic'>{{ $resultados_quimico->sic }}</td>
                                <td field-key='ppc'>{{ $resultados_quimico->ppc }}</td>
                                <td field-key='c_reagido'>{{ $resultados_quimico->c_reagido }}</td>
                                <td field-key='si_reagido'>{{ $resultados_quimico->si_reagido }}</td>
                                <td field-key='si_livre'>{{ $resultados_quimico->si_livre }}</td>
                                <td field-key='sio2'>{{ $resultados_quimico->sio2 }}</td>
                                <td field-key='si_sio2'>{{ $resultados_quimico->si_sio2 }}</td>
                                <td field-key='fe2o3'>{{ $resultados_quimico->fe2o3 }}</td>
                                <td field-key='al2o3'>{{ $resultados_quimico->al2o3 }}</td>
                                <td field-key='cao'>{{ $resultados_quimico->cao }}</td>
                                <td field-key='mgo'>{{ $resultados_quimico->mgo }}</td>
                                <td field-key='observa'>{{ $resultados_quimico->observa }}</td>
                                <td field-key='status'>{{ $resultados_quimico->status }}</td>
                                <td field-key='c_livgre'>{{ $resultados_quimico->c_livgre }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('resultados_quimico_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.resultados_quimicos.restore', $resultados_quimico->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('resultados_quimico_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.resultados_quimicos.perma_del', $resultados_quimico->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('resultados_quimico_view')
                                    <a href="{{ route('admin.resultados_quimicos.show',[$resultados_quimico->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('resultados_quimico_edit')
                                    <a href="{{ route('admin.resultados_quimicos.edit',[$resultados_quimico->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('resultados_quimico_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.resultados_quimicos.destroy', $resultados_quimico->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="25">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.analise_quimicas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop
