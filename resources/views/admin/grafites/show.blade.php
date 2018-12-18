@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.grafite.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.data')</th>
                            <td field-key='data'>{{ $grafite->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.nota-fiscal')</th>
                            <td field-key='nota_fiscal'>{{ $grafite->nota_fiscal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.transportadora')</th>
                            <td field-key='transportadora'>{{ $grafite->transportadora }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.fornecedor')</th>
                            <td field-key='fornecedor'>{{ $grafite->fornecedor->nome_fantasia or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.forno')</th>
                            <td field-key='forno'>{{ $grafite->forno }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.operacao')</th>
                            <td field-key='operacao'>{{ $grafite->operacao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.quantidade')</th>
                            <td field-key='quantidade'>{{ $grafite->quantidade }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.umidade')</th>
                            <td field-key='umidade'>{{ $grafite->umidade }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.quantidade-real')</th>
                            <td field-key='quantidade_real'>{{ $grafite->quantidade_real }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.entrada-acumulada')</th>
                            <td field-key='entrada_acumulada'>{{ $grafite->entrada_acumulada }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.observacoes')</th>
                            <td field-key='observacoes'>{{ $grafite->observacoes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.grafite.fields.quantidade-bags')</th>
                            <td field-key='quantidade_bags'>{{ $grafite->quantidade_bags }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.grafites.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
