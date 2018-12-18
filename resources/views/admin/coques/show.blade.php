@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.coque.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.coque.fields.data-recebimento')</th>
                            <td field-key='data_recebimento'>{{ $coque->data_recebimento }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.data-expedicao')</th>
                            <td field-key='data_expedicao'>{{ $coque->data_expedicao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.transportadora')</th>
                            <td field-key='transportadora'>{{ $coque->transportadora }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.fornecedor')</th>
                            <td field-key='fornecedor'>{{ $coque->fornecedor->nome_fantasia or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.nota-fiscal')</th>
                            <td field-key='nota_fiscal'>{{ $coque->nota_fiscal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.cte')</th>
                            <td field-key='cte'>{{ $coque->cte }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.peso-nf')</th>
                            <td field-key='peso_nf'>{{ $coque->peso_nf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.peso-sicbras')</th>
                            <td field-key='peso_sicbras'>{{ $coque->peso_sicbras }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.diferenca')</th>
                            <td field-key='diferenca'>{{ $coque->diferenca }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.rs-acordo')</th>
                            <td field-key='rs_acordo'>{{ $coque->rs_acordo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.cambio')</th>
                            <td field-key='cambio'>{{ $coque->cambio }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.dolar-acordo')</th>
                            <td field-key='dolar_acordo'>{{ $coque->dolar_acordo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.valor-nota')</th>
                            <td field-key='valor_nota'>{{ $coque->valor_nota }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.rs-real-imposto')</th>
                            <td field-key='rs_real_imposto'>{{ $coque->rs_real_imposto }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.icms')</th>
                            <td field-key='icms'>{{ $coque->icms }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.pis-confins')</th>
                            <td field-key='pis_confins'>{{ $coque->pis_confins }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.ipi')</th>
                            <td field-key='ipi'>{{ $coque->ipi }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.encargo-30')</th>
                            <td field-key='encargo_30'>{{ $coque->encargo_30 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.rs-real-semimposto')</th>
                            <td field-key='rs_real_semimposto'>{{ $coque->rs_real_semimposto }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.dolar-sem-imposto')</th>
                            <td field-key='dolar_sem_imposto'>{{ $coque->dolar_sem_imposto }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.valor-frete')</th>
                            <td field-key='valor_frete'>{{ $coque->valor_frete }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.rs-frete')</th>
                            <td field-key='rs_frete'>{{ $coque->rs_frete }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coque.fields.saldo-retirar')</th>
                            <td field-key='saldo_retirar'>{{ $coque->saldo_retirar }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.coques.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
