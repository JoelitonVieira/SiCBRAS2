@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.coque-saida.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.coque-saida.fields.data')</th>
                            <td field-key='data'>{{ $coque_saida->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque-saida.fields.lider')</th>
                            <td field-key='lider'>{{ $coque_saida->lider }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque-saida.fields.forno')</th>
                            <td field-key='forno'>{{ $coque_saida->forno }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque-saida.fields.saida')</th>
                            <td field-key='saida'>{{ $coque_saida->saida }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque-saida.fields.saida-acumulada')</th>
                            <td field-key='saida_acumulada'>{{ $coque_saida->saida_acumulada }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque-saida.fields.observacao')</th>
                            <td field-key='observacao'>{{ $coque_saida->observacao }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.coque_saidas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
