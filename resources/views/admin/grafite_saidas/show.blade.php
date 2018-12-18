@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.grafite-saida.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.data')</th>
                            <td field-key='data'>{{ $grafite_saida->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.nome-lider')</th>
                            <td field-key='nome_lider'>{{ $grafite_saida->nome_lider }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.forno')</th>
                            <td field-key='forno'>{{ $grafite_saida->forno }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.operacao')</th>
                            <td field-key='operacao'>{{ $grafite_saida->operacao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.saida')</th>
                            <td field-key='saida'>{{ $grafite_saida->saida }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.umidade')</th>
                            <td field-key='umidade'>{{ $grafite_saida->umidade }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.quantidade-real')</th>
                            <td field-key='quantidade_real'>{{ $grafite_saida->quantidade_real }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.saida-acumulada')</th>
                            <td field-key='saida_acumulada'>{{ $grafite_saida->saida_acumulada }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.observacoes')</th>
                            <td field-key='observacoes'>{{ $grafite_saida->observacoes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.quantidade-bags')</th>
                            <td field-key='quantidade_bags'>{{ $grafite_saida->quantidade_bags }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite-saida.fields.fornecedor')</th>
                            <td field-key='fornecedor'>{{ $grafite_saida->fornecedor->nome_fantasia or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.grafite_saidas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
