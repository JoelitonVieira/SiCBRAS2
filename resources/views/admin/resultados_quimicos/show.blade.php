@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.resultados-quimicos.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.data')</th>
                            <td field-key='data'>{{ $resultados_quimico->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.op-forno')</th>
                            <td field-key='op_forno'>{{ $resultados_quimico->op_forno }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.quantidade')</th>
                            <td field-key='quantidade'>{{ $resultados_quimico->quantidade }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.numeracao')</th>
                            <td field-key='numeracao'>{{ $resultados_quimico->numeracao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.sic-flourizado')</th>
                            <td field-key='sic_flourizado'>{{ $resultados_quimico->sic_flourizado }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.sic')</th>
                            <td field-key='sic'>{{ $resultados_quimico->sic }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.ppc')</th>
                            <td field-key='ppc'>{{ $resultados_quimico->ppc }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.c-reagido')</th>
                            <td field-key='c_reagido'>{{ $resultados_quimico->c_reagido }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.si-reagido')</th>
                            <td field-key='si_reagido'>{{ $resultados_quimico->si_reagido }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.si-livre')</th>
                            <td field-key='si_livre'>{{ $resultados_quimico->si_livre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.sio2')</th>
                            <td field-key='sio2'>{{ $resultados_quimico->sio2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.si-sio2')</th>
                            <td field-key='si_sio2'>{{ $resultados_quimico->si_sio2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.fe2o3')</th>
                            <td field-key='fe2o3'>{{ $resultados_quimico->fe2o3 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.al2o3')</th>
                            <td field-key='al2o3'>{{ $resultados_quimico->al2o3 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.cao')</th>
                            <td field-key='cao'>{{ $resultados_quimico->cao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.mgo')</th>
                            <td field-key='mgo'>{{ $resultados_quimico->mgo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.observa')</th>
                            <td field-key='observa'>{{ $resultados_quimico->observa }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.status')</th>
                            <td field-key='status'>{{ $resultados_quimico->status }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-quimicos.fields.c-livgre')</th>
                            <td field-key='c_livgre'>{{ $resultados_quimico->c_livgre }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.resultados_quimicos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
