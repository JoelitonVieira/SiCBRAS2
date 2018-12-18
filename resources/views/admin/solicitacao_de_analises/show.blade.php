@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.solicitacao-de-analise.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.turnos')</th>
                            <td field-key='turnos'>{{ $solicitacao_de_analise->turnos }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.nome-resp-amostragem')</th>
                            <td field-key='nome_resp_amostragem'>{{ $solicitacao_de_analise->nome_resp_amostragem }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.mat-primas')</th>
                            <td field-key='mat_primas'>{{ $solicitacao_de_analise->mat_primas }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.lote-ano')</th>
                            <td field-key='lote_ano'>{{ $solicitacao_de_analise->lote_ano }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.tipos-graf')</th>
                            <td field-key='tipos_graf'>{{ $solicitacao_de_analise->tipos_graf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.n-op')</th>
                            <td field-key='n_op'>{{ $solicitacao_de_analise->n_op }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.forno')</th>
                            <td field-key='forno'>{{ $solicitacao_de_analise->forno }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.fornecedor')</th>
                            <td field-key='fornecedor'>{{ $solicitacao_de_analise->fornecedor->nome_fantasia or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.origem')</th>
                            <td field-key='origem'>{{ $solicitacao_de_analise->origem }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.tipos-de-misturas')</th>
                            <td field-key='tipos_de_misturas'>{{ $solicitacao_de_analise->tipos_de_misturas }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.numero-operacao')</th>
                            <td field-key='numero_operacao'>{{ $solicitacao_de_analise->numero_operacao }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.fornos-das-misturas')</th>
                            <td field-key='fornos_das_misturas'>{{ $solicitacao_de_analise->fornos_das_misturas }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.amostra-teste')</th>
                            <td field-key='amostra_teste'>{{ $solicitacao_de_analise->amostra_teste }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.material')</th>
                            <td field-key='material'>{{ $solicitacao_de_analise->material }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.solicitacao-de-analise.fields.identificacao-da-amostra')</th>
                            <td field-key='identificacao_da_amostra'>{{ $solicitacao_de_analise->identificacao_da_amostra }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.solicitacao_de_analises.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


