@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.fornecedor.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.fornecedor.fields.nome-fantasia')</th>
                            <td field-key='nome_fantasia'>{{ $fornecedor->nome_fantasia }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.fornecedor.fields.matprima-fornecida')</th>
                            <td field-key='matprima_fornecida'>{{ $fornecedor->matprima_fornecida }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.fornecedor.fields.telefone')</th>
                            <td field-key='telefone'>{{ $fornecedor->telefone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.fornecedor.fields.email')</th>
                            <td field-key='email'>{{ $fornecedor->email }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#areia" aria-controls="areia" role="tab" data-toggle="tab">Areia</a></li>
<li role="presentation" class=""><a href="#coque" aria-controls="coque" role="tab" data-toggle="tab">Coque Bruto</a></li>
<li role="presentation" class=""><a href="#grafite" aria-controls="grafite" role="tab" data-toggle="tab">Grafite</a></li>
<li role="presentation" class=""><a href="#pasta_a_frio_ou_briquete" aria-controls="pasta_a_frio_ou_briquete" role="tab" data-toggle="tab">Pasta a Frio ou Pasta Briquete</a></li>
<li role="presentation" class=""><a href="#solicitacao_de_analise" aria-controls="solicitacao_de_analise" role="tab" data-toggle="tab">Solicitação de Análise</a></li>
<li role="presentation" class=""><a href="#grafite_saida" aria-controls="grafite_saida" role="tab" data-toggle="tab">Grafite</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="areia">
<table class="table table-bordered table-striped {{ count($areias) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.areia.fields.data')</th>
                        <th>@lang('quickadmin.areia.fields.fornecedor')</th>
                        <th>@lang('quickadmin.areia.fields.num-nf')</th>
                        <th>@lang('quickadmin.areia.fields.cte')</th>
                        <th>@lang('quickadmin.areia.fields.peso-nf')</th>
                        <th>@lang('quickadmin.areia.fields.peso-sicbras')</th>
                        <th>@lang('quickadmin.areia.fields.diferenca')</th>
                        <th>@lang('quickadmin.areia.fields.valor-prod')</th>
                        <th>@lang('quickadmin.areia.fields.valor-frete')</th>
                        <th>@lang('quickadmin.areia.fields.rs-areia')</th>
                        <th>@lang('quickadmin.areia.fields.rs-frete')</th>
                        <th>@lang('quickadmin.areia.fields.saldo-retirar')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($areias) > 0)
            @foreach ($areias as $areia)
                <tr data-entry-id="{{ $areia->id }}">
                    <td field-key='data'>{{ $areia->data }}</td>
                                <td field-key='fornecedor'>{{ $areia->fornecedor->nome_fantasia or '' }}</td>
                                <td field-key='num_nf'>{{ $areia->num_nf }}</td>
                                <td field-key='cte'>{{ $areia->cte }}</td>
                                <td field-key='peso_nf'>{{ $areia->peso_nf }}</td>
                                <td field-key='peso_sicbras'>{{ $areia->peso_sicbras }}</td>
                                <td field-key='diferenca'>{{ $areia->diferenca }}</td>
                                <td field-key='valor_prod'>{{ $areia->valor_prod }}</td>
                                <td field-key='valor_frete'>{{ $areia->valor_frete }}</td>
                                <td field-key='rs_areia'>{{ $areia->rs_areia }}</td>
                                <td field-key='rs_frete'>{{ $areia->rs_frete }}</td>
                                <td field-key='saldo_retirar'>{{ $areia->saldo_retirar }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('areium_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.areias.restore', $areia->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('areium_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.areias.perma_del', $areia->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('areium_view')
                                    <a href="{{ route('admin.areias.show',[$areia->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('areium_edit')
                                    <a href="{{ route('admin.areias.edit',[$areia->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('areium_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.areias.destroy', $areia->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="coque">
<table class="table table-bordered table-striped {{ count($coques) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.coque.fields.data-recebimento')</th>
                        <th>@lang('quickadmin.coque.fields.data-expedicao')</th>
                        <th>@lang('quickadmin.coque.fields.transportadora')</th>
                        <th>@lang('quickadmin.coque.fields.fornecedor')</th>
                        <th>@lang('quickadmin.coque.fields.nota-fiscal')</th>
                        <th>@lang('quickadmin.coque.fields.cte')</th>
                        <th>@lang('quickadmin.coque.fields.peso-nf')</th>
                        <th>@lang('quickadmin.coque.fields.peso-sicbras')</th>
                        <th>@lang('quickadmin.coque.fields.diferenca')</th>
                        <th>@lang('quickadmin.coque.fields.rs-acordo')</th>
                        <th>@lang('quickadmin.coque.fields.cambio')</th>
                        <th>@lang('quickadmin.coque.fields.dolar-acordo')</th>
                        <th>@lang('quickadmin.coque.fields.valor-nota')</th>
                        <th>@lang('quickadmin.coque.fields.rs-real-imposto')</th>
                        <th>@lang('quickadmin.coque.fields.icms')</th>
                        <th>@lang('quickadmin.coque.fields.pis-confins')</th>
                        <th>@lang('quickadmin.coque.fields.ipi')</th>
                        <th>@lang('quickadmin.coque.fields.encargo-30')</th>
                        <th>@lang('quickadmin.coque.fields.rs-real-semimposto')</th>
                        <th>@lang('quickadmin.coque.fields.dolar-sem-imposto')</th>
                        <th>@lang('quickadmin.coque.fields.valor-frete')</th>
                        <th>@lang('quickadmin.coque.fields.rs-frete')</th>
                        <th>@lang('quickadmin.coque.fields.saldo-retirar')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($coques) > 0)
            @foreach ($coques as $coque)
                <tr data-entry-id="{{ $coque->id }}">
                    <td field-key='data_recebimento'>{{ $coque->data_recebimento }}</td>
                                <td field-key='data_expedicao'>{{ $coque->data_expedicao }}</td>
                                <td field-key='transportadora'>{{ $coque->transportadora }}</td>
                                <td field-key='fornecedor'>{{ $coque->fornecedor->nome_fantasia or '' }}</td>
                                <td field-key='nota_fiscal'>{{ $coque->nota_fiscal }}</td>
                                <td field-key='cte'>{{ $coque->cte }}</td>
                                <td field-key='peso_nf'>{{ $coque->peso_nf }}</td>
                                <td field-key='peso_sicbras'>{{ $coque->peso_sicbras }}</td>
                                <td field-key='diferenca'>{{ $coque->diferenca }}</td>
                                <td field-key='rs_acordo'>{{ $coque->rs_acordo }}</td>
                                <td field-key='cambio'>{{ $coque->cambio }}</td>
                                <td field-key='dolar_acordo'>{{ $coque->dolar_acordo }}</td>
                                <td field-key='valor_nota'>{{ $coque->valor_nota }}</td>
                                <td field-key='rs_real_imposto'>{{ $coque->rs_real_imposto }}</td>
                                <td field-key='icms'>{{ $coque->icms }}</td>
                                <td field-key='pis_confins'>{{ $coque->pis_confins }}</td>
                                <td field-key='ipi'>{{ $coque->ipi }}</td>
                                <td field-key='encargo_30'>{{ $coque->encargo_30 }}</td>
                                <td field-key='rs_real_semimposto'>{{ $coque->rs_real_semimposto }}</td>
                                <td field-key='dolar_sem_imposto'>{{ $coque->dolar_sem_imposto }}</td>
                                <td field-key='valor_frete'>{{ $coque->valor_frete }}</td>
                                <td field-key='rs_frete'>{{ $coque->rs_frete }}</td>
                                <td field-key='saldo_retirar'>{{ $coque->saldo_retirar }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('coque_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.coques.restore', $coque->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('coque_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.coques.perma_del', $coque->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('coque_view')
                                    <a href="{{ route('admin.coques.show',[$coque->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('coque_edit')
                                    <a href="{{ route('admin.coques.edit',[$coque->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('coque_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.coques.destroy', $coque->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="28">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="grafite">
<table class="table table-bordered table-striped {{ count($grafites) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.grafite.fields.data')</th>
                        <th>@lang('quickadmin.grafite.fields.nota-fiscal')</th>
                        <th>@lang('quickadmin.grafite.fields.transportadora')</th>
                        <th>@lang('quickadmin.grafite.fields.fornecedor')</th>
                        <th>@lang('quickadmin.grafite.fields.forno')</th>
                        <th>@lang('quickadmin.grafite.fields.operacao')</th>
                        <th>@lang('quickadmin.grafite.fields.quantidade')</th>
                        <th>@lang('quickadmin.grafite.fields.umidade')</th>
                        <th>@lang('quickadmin.grafite.fields.quantidade-real')</th>
                        <th>@lang('quickadmin.grafite.fields.entrada-acumulada')</th>
                        <th>@lang('quickadmin.grafite.fields.observacoes')</th>
                        <th>@lang('quickadmin.grafite.fields.quantidade-bags')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($grafites) > 0)
            @foreach ($grafites as $grafite)
                <tr data-entry-id="{{ $grafite->id }}">
                    <td field-key='data'>{{ $grafite->data }}</td>
                                <td field-key='nota_fiscal'>{{ $grafite->nota_fiscal }}</td>
                                <td field-key='transportadora'>{{ $grafite->transportadora }}</td>
                                <td field-key='fornecedor'>{{ $grafite->fornecedor->nome_fantasia or '' }}</td>
                                <td field-key='forno'>{{ $grafite->forno }}</td>
                                <td field-key='operacao'>{{ $grafite->operacao }}</td>
                                <td field-key='quantidade'>{{ $grafite->quantidade }}</td>
                                <td field-key='umidade'>{{ $grafite->umidade }}</td>
                                <td field-key='quantidade_real'>{{ $grafite->quantidade_real }}</td>
                                <td field-key='entrada_acumulada'>{{ $grafite->entrada_acumulada }}</td>
                                <td field-key='observacoes'>{{ $grafite->observacoes }}</td>
                                <td field-key='quantidade_bags'>{{ $grafite->quantidade_bags }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('grafite_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.grafites.restore', $grafite->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('grafite_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.grafites.perma_del', $grafite->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('grafite_view')
                                    <a href="{{ route('admin.grafites.show',[$grafite->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('grafite_edit')
                                    <a href="{{ route('admin.grafites.edit',[$grafite->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('grafite_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.grafites.destroy', $grafite->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="pasta_a_frio_ou_briquete">
<table class="table table-bordered table-striped {{ count($pasta_a_frio_ou_briquetes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.materia-prima')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.data')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.num-nf')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.transportadora')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.fornecedor')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.quantidade')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.entrada-acumulada')</th>
                        <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.observacoes')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($pasta_a_frio_ou_briquetes) > 0)
            @foreach ($pasta_a_frio_ou_briquetes as $pasta_a_frio_ou_briquete)
                <tr data-entry-id="{{ $pasta_a_frio_ou_briquete->id }}">
                    <td field-key='materia_prima'>{{ $pasta_a_frio_ou_briquete->materia_prima }}</td>
                                <td field-key='data'>{{ $pasta_a_frio_ou_briquete->data }}</td>
                                <td field-key='num_nf'>{{ $pasta_a_frio_ou_briquete->num_nf }}</td>
                                <td field-key='transportadora'>{{ $pasta_a_frio_ou_briquete->transportadora }}</td>
                                <td field-key='fornecedor'>{{ $pasta_a_frio_ou_briquete->fornecedor->nome_fantasia or '' }}</td>
                                <td field-key='quantidade'>{{ $pasta_a_frio_ou_briquete->quantidade }}</td>
                                <td field-key='entrada_acumulada'>{{ $pasta_a_frio_ou_briquete->entrada_acumulada }}</td>
                                <td field-key='observacoes'>{{ $pasta_a_frio_ou_briquete->observacoes }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('pasta_a_frio_ou_briquete_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.pasta_a_frio_ou_briquetes.restore', $pasta_a_frio_ou_briquete->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('pasta_a_frio_ou_briquete_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.pasta_a_frio_ou_briquetes.perma_del', $pasta_a_frio_ou_briquete->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('pasta_a_frio_ou_briquete_view')
                                    <a href="{{ route('admin.pasta_a_frio_ou_briquetes.show',[$pasta_a_frio_ou_briquete->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('pasta_a_frio_ou_briquete_edit')
                                    <a href="{{ route('admin.pasta_a_frio_ou_briquetes.edit',[$pasta_a_frio_ou_briquete->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('pasta_a_frio_ou_briquete_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.pasta_a_frio_ou_briquetes.destroy', $pasta_a_frio_ou_briquete->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="13">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="solicitacao_de_analise">
<table class="table table-bordered table-striped {{ count($solicitacao_de_analises) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.solicitacao-de-analise.fields.turnos')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.nome-resp-amostragem')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.mat-primas')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.lote-ano')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.tipos-graf')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.n-op')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.fornecedor')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.origem')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.tipos-de-misturas')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.numero-operacao')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.fornos-das-misturas')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.amostra-teste')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.material')</th>
                        <th>@lang('quickadmin.solicitacao-de-analise.fields.identificacao-da-amostra')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($solicitacao_de_analises) > 0)
            @foreach ($solicitacao_de_analises as $solicitacao_de_analise)
                <tr data-entry-id="{{ $solicitacao_de_analise->id }}">
                    <td field-key='turnos'>{{ $solicitacao_de_analise->turnos }}</td>
                                <td field-key='nome_resp_amostragem'>{{ $solicitacao_de_analise->nome_resp_amostragem }}</td>
                                <td field-key='mat_primas'>{{ $solicitacao_de_analise->mat_primas }}</td>
                                <td field-key='lote_ano'>{{ $solicitacao_de_analise->lote_ano }}</td>
                                <td field-key='tipos_graf'>{{ $solicitacao_de_analise->tipos_graf }}</td>
                                <td field-key='n_op'>{{ $solicitacao_de_analise->n_op }}</td>
                                <td field-key='fornecedor'>{{ $solicitacao_de_analise->fornecedor->nome_fantasia or '' }}</td>
                                <td field-key='origem'>{{ $solicitacao_de_analise->origem }}</td>
                                <td field-key='tipos_de_misturas'>{{ $solicitacao_de_analise->tipos_de_misturas }}</td>
                                <td field-key='numero_operacao'>{{ $solicitacao_de_analise->numero_operacao }}</td>
                                <td field-key='fornos_das_misturas'>{{ $solicitacao_de_analise->fornos_das_misturas }}</td>
                                <td field-key='amostra_teste'>{{ $solicitacao_de_analise->amostra_teste }}</td>
                                <td field-key='material'>{{ $solicitacao_de_analise->material }}</td>
                                <td field-key='identificacao_da_amostra'>{{ $solicitacao_de_analise->identificacao_da_amostra }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('solicitacao_de_analise_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.solicitacao_de_analises.restore', $solicitacao_de_analise->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('solicitacao_de_analise_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.solicitacao_de_analises.perma_del', $solicitacao_de_analise->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('solicitacao_de_analise_view')
                                    <a href="{{ route('admin.solicitacao_de_analises.show',[$solicitacao_de_analise->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('solicitacao_de_analise_edit')
                                    <a href="{{ route('admin.solicitacao_de_analises.edit',[$solicitacao_de_analise->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('solicitacao_de_analise_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.solicitacao_de_analises.destroy', $solicitacao_de_analise->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="20">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="grafite_saida">
<table class="table table-bordered table-striped {{ count($grafite_saidas) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.grafite-saida.fields.data')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.nome-lider')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.forno')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.operacao')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.saida')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.umidade')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.quantidade-real')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.saida-acumulada')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.observacoes')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.quantidade-bags')</th>
                        <th>@lang('quickadmin.grafite-saida.fields.fornecedor')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($grafite_saidas) > 0)
            @foreach ($grafite_saidas as $grafite_saida)
                <tr data-entry-id="{{ $grafite_saida->id }}">
                    <td field-key='data'>{{ $grafite_saida->data }}</td>
                                <td field-key='nome_lider'>{{ $grafite_saida->nome_lider }}</td>
                                <td field-key='forno'>{{ $grafite_saida->forno }}</td>
                                <td field-key='operacao'>{{ $grafite_saida->operacao }}</td>
                                <td field-key='saida'>{{ $grafite_saida->saida }}</td>
                                <td field-key='umidade'>{{ $grafite_saida->umidade }}</td>
                                <td field-key='quantidade_real'>{{ $grafite_saida->quantidade_real }}</td>
                                <td field-key='saida_acumulada'>{{ $grafite_saida->saida_acumulada }}</td>
                                <td field-key='observacoes'>{{ $grafite_saida->observacoes }}</td>
                                <td field-key='quantidade_bags'>{{ $grafite_saida->quantidade_bags }}</td>
                                <td field-key='fornecedor'>{{ $grafite_saida->fornecedor->nome_fantasia or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('grafite_saida_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.grafite_saidas.restore', $grafite_saida->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('grafite_saida_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.grafite_saidas.perma_del', $grafite_saida->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('grafite_saida_view')
                                    <a href="{{ route('admin.grafite_saidas.show',[$grafite_saida->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('grafite_saida_edit')
                                    <a href="{{ route('admin.grafite_saidas.edit',[$grafite_saida->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('grafite_saida_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.grafite_saidas.destroy', $grafite_saida->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="16">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.fornecedors.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


