@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pasta-a-frio-e-briquete-saida.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.materia-prima')</th>
                            <td field-key='materia_prima'>{{ $pasta_a_frio_e_briquete_saida->materia_prima }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.data')</th>
                            <td field-key='data'>{{ $pasta_a_frio_e_briquete_saida->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.lider-saida')</th>
                            <td field-key='lider_saida'>{{ $pasta_a_frio_e_briquete_saida->lider_saida }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.forno-saida')</th>
                            <td field-key='forno_saida'>{{ $pasta_a_frio_e_briquete_saida->forno_saida }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.operacao')</th>
                            <td field-key='operacao'>{{ $pasta_a_frio_e_briquete_saida->operacao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.saida')</th>
                            <td field-key='saida'>{{ $pasta_a_frio_e_briquete_saida->saida }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.saida-acumulada')</th>
                            <td field-key='saida_acumulada'>{{ $pasta_a_frio_e_briquete_saida->saida_acumulada }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-e-briquete-saida.fields.observacoes')</th>
                            <td field-key='observacoes'>{{ $pasta_a_frio_e_briquete_saida->observacoes }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.pasta_a_frio_e_briquete_saidas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
