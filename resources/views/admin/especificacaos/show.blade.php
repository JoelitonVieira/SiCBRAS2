@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.especificacao.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.especificacao.fields.codigo')</th>
                            <td field-key='codigo'>{{ $especificacao->codigo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.especificacao.fields.data')</th>
                            <td field-key='data'>{{ $especificacao->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.especificacao.fields.requisito-iso')</th>
                            <td field-key='requisito_iso'>{{ $especificacao->requisito_iso }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.especificacao.fields.nome-cliente')</th>
                            <td field-key='nome_cliente'>{{ $especificacao->nome_cliente->nome_cliente or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.especificacao.fields.cd-produto')</th>
                            <td field-key='cd_produto'>{{ $especificacao->cd_produto->codigo or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.produtos.fields.produto')</th>
                            <td field-key='produto'>{{ isset($especificacao->cd_produto) ? $especificacao->cd_produto->produto : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.produtos.fields.granulometria')</th>
                            <td field-key='granulometria'>{{ isset($especificacao->cd_produto) ? $especificacao->cd_produto->granulometria : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#composicao_fisica" aria-controls="composicao_fisica" role="tab" data-toggle="tab">Composicao fisica</a></li>
<li role="presentation" class=""><a href="#composicao_granulometrica" aria-controls="composicao_granulometrica" role="tab" data-toggle="tab">Composição Granulométrica</a></li>
<li role="presentation" class=""><a href="#composicao_quimica" aria-controls="composicao_quimica" role="tab" data-toggle="tab">Composição Química</a></li>
<li role="presentation" class=""><a href="#solicitar_amostra" aria-controls="solicitar_amostra" role="tab" data-toggle="tab">Solicitar Amostra</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="composicao_fisica">
<table class="table table-bordered table-striped {{ count($composicao_fisicas) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.composicao-fisica.fields.granulometria')</th>
                        <th>@lang('quickadmin.composicao-fisica.fields.maximo')</th>
                        <th>@lang('quickadmin.composicao-fisica.fields.minimo')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($composicao_fisicas) > 0)
            @foreach ($composicao_fisicas as $composicao_fisica)
                <tr data-entry-id="{{ $composicao_fisica->id }}">
                    <td field-key='granulometria'>{{ $composicao_fisica->granulometria }}</td>
                                <td field-key='maximo'>{{ $composicao_fisica->maximo }}</td>
                                <td field-key='minimo'>{{ $composicao_fisica->minimo }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('composicao_fisica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.composicao_fisicas.restore', $composicao_fisica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('composicao_fisica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.composicao_fisicas.perma_del', $composicao_fisica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('composicao_fisica_view')
                                    <a href="{{ route('admin.composicao_fisicas.show',[$composicao_fisica->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('composicao_fisica_edit')
                                    <a href="{{ route('admin.composicao_fisicas.edit',[$composicao_fisica->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('composicao_fisica_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.composicao_fisicas.destroy', $composicao_fisica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="composicao_granulometrica">
<table class="table table-bordered table-striped {{ count($composicao_granulometricas) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.composicao-granulometrica.fields.telas')</th>
                        <th>@lang('quickadmin.composicao-granulometrica.fields.maximo')</th>
                        <th>@lang('quickadmin.composicao-granulometrica.fields.minimo')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($composicao_granulometricas) > 0)
            @foreach ($composicao_granulometricas as $composicao_granulometrica)
                <tr data-entry-id="{{ $composicao_granulometrica->id }}">
                    <td field-key='telas'>{{ $composicao_granulometrica->telas }}</td>
                                <td field-key='maximo'>{{ $composicao_granulometrica->maximo }}</td>
                                <td field-key='minimo'>{{ $composicao_granulometrica->minimo }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('composicao_granulometrica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.composicao_granulometricas.restore', $composicao_granulometrica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('composicao_granulometrica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.composicao_granulometricas.perma_del', $composicao_granulometrica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('composicao_granulometrica_view')
                                    <a href="{{ route('admin.composicao_granulometricas.show',[$composicao_granulometrica->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('composicao_granulometrica_edit')
                                    <a href="{{ route('admin.composicao_granulometricas.edit',[$composicao_granulometrica->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('composicao_granulometrica_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.composicao_granulometricas.destroy', $composicao_granulometrica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="composicao_quimica">
<table class="table table-bordered table-striped {{ count($composicao_quimicas) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.composicao-quimica.fields.comp')</th>
                        <th>@lang('quickadmin.composicao-quimica.fields.max')</th>
                        <th>@lang('quickadmin.composicao-quimica.fields.minimo')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($composicao_quimicas) > 0)
            @foreach ($composicao_quimicas as $composicao_quimica)
                <tr data-entry-id="{{ $composicao_quimica->id }}">
                    <td field-key='comp'>{{ $composicao_quimica->comp }}</td>
                                <td field-key='max'>{{ $composicao_quimica->max }}</td>
                                <td field-key='minimo'>{{ $composicao_quimica->minimo }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('composicao_quimica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.composicao_quimicas.restore', $composicao_quimica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('composicao_quimica_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.composicao_quimicas.perma_del', $composicao_quimica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('composicao_quimica_view')
                                    <a href="{{ route('admin.composicao_quimicas.show',[$composicao_quimica->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('composicao_quimica_edit')
                                    <a href="{{ route('admin.composicao_quimicas.edit',[$composicao_quimica->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('composicao_quimica_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.composicao_quimicas.destroy', $composicao_quimica->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="solicitar_amostra">
<table class="table table-bordered table-striped {{ count($solicitar_amostras) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.solicitar-amostra.fields.setor')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.data')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.equipamento')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.amostra')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.responsavel')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.referencia')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.alimentacao')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.od-producao')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.bag-pallet')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.peso')</th>
                        <th>@lang('quickadmin.solicitar-amostra.fields.cd-especificacao')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($solicitar_amostras) > 0)
            @foreach ($solicitar_amostras as $solicitar_amostra)
                <tr data-entry-id="{{ $solicitar_amostra->id }}">
                    <td field-key='setor'>{{ $solicitar_amostra->setor }}</td>
                                <td field-key='data'>{{ $solicitar_amostra->data }}</td>
                                <td field-key='equipamento'>{{ $solicitar_amostra->equipamento }}</td>
                                <td field-key='amostra'>{{ $solicitar_amostra->amostra }}</td>
                                <td field-key='responsavel'>{{ $solicitar_amostra->responsavel }}</td>
                                <td field-key='referencia'>{{ $solicitar_amostra->referencia }}</td>
                                <td field-key='alimentacao'>{{ $solicitar_amostra->alimentacao }}</td>
                                <td field-key='od_producao'>{{ $solicitar_amostra->od_producao }}</td>
                                <td field-key='bag_pallet'>{{ $solicitar_amostra->bag_pallet }}</td>
                                <td field-key='peso'>{{ $solicitar_amostra->peso }}</td>
                                <td field-key='cd_especificacao'>{{ $solicitar_amostra->cd_especificacao->codigo or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('solicitar_amostra_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.solicitar_amostras.restore', $solicitar_amostra->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('solicitar_amostra_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.solicitar_amostras.perma_del', $solicitar_amostra->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('solicitar_amostra_view')
                                    <a href="{{ route('admin.solicitar_amostras.show',[$solicitar_amostra->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('solicitar_amostra_edit')
                                    <a href="{{ route('admin.solicitar_amostras.edit',[$solicitar_amostra->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('solicitar_amostra_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.solicitar_amostras.destroy', $solicitar_amostra->id])) !!}
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

            <a href="{{ route('admin.especificacaos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
