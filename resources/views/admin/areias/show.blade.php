@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.areia.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.areia.fields.data')</th>
                            <td field-key='data'>{{ $areia->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.fornecedor')</th>
                            <td field-key='fornecedor'>{{ $areia->fornecedor->nome_fantasia or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.num-nf')</th>
                            <td field-key='num_nf'>{{ $areia->num_nf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.cte')</th>
                            <td field-key='cte'>{{ $areia->cte }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.peso-nf')</th>
                            <td field-key='peso_nf'>{{ $areia->peso_nf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.peso-sicbras')</th>
                            <td field-key='peso_sicbras'>{{ $areia->peso_sicbras }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.diferenca')</th>
                            <td field-key='diferenca'>{{ $areia->diferenca }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.valor-prod')</th>
                            <td field-key='valor_prod'>{{ $areia->valor_prod }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.valor-frete')</th>
                            <td field-key='valor_frete'>{{ $areia->valor_frete }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.rs-areia')</th>
                            <td field-key='rs_areia'>{{ $areia->rs_areia }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.rs-frete')</th>
                            <td field-key='rs_frete'>{{ $areia->rs_frete }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.areia.fields.saldo-retirar')</th>
                            <td field-key='saldo_retirar'>{{ $areia->saldo_retirar }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.areias.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
