@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.treinamento.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.nome-treinamento')</th>
                            <td field-key='nome_treinamento'>{{ $treinamento->nome_treinamento->nome_treinamento or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.carga-horaria')</th>
                            <td field-key='carga_horaria'>{{ $treinamento->carga_horaria }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.nome-setores')</th>
                            <td field-key='nome_setores'>{{ $treinamento->nome_setores->nome_setores or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.data-inicio')</th>
                            <td field-key='data_inicio'>{{ $treinamento->data_inicio }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.data-conclusao')</th>
                            <td field-key='data_conclusao'>{{ $treinamento->data_conclusao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.validadade')</th>
                            <td field-key='validadade'>{{ $treinamento->validadade }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.reciclagem')</th>
                            <td field-key='reciclagem'>{{ $treinamento->reciclagem }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.situacao-turma')</th>
                            <td field-key='situacao_turma'>{{ $treinamento->situacao_turma }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.localidade')</th>
                            <td field-key='localidade'>{{ $treinamento->localidade }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.disponibilidade')</th>
                            <td field-key='disponibilidade'>{{ $treinamento->disponibilidade }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.instrutor')</th>
                            <td field-key='instrutor'>{{ $treinamento->instrutor->nome_funcionario or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.nome-participantes')</th>
                            <td field-key='nome_participantes'>
                                @foreach ($treinamento->nome_participantes as $singleNomeParticipantes)
                                    <span class="label label-info label-many">{{ $singleNomeParticipantes->nome_funcionario }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.tipo-treinamento')</th>
                            <td field-key='tipo_treinamento'>{{ $treinamento->tipo_treinamento->nome_tipo_treinamento or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.espec-treinamento')</th>
                            <td field-key='espec_treinamento'>{{ $treinamento->espec_treinamento->nome_espectreinamento or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.treinamento.fields.horas')</th>
                            <td field-key='horas'>{{ $treinamento->horas }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.treinamentos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });
            
        });
    </script>
            
@stop
