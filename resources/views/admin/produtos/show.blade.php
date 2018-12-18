@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.produtos.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.produtos.fields.codigo')</th>
                            <td field-key='codigo'>{{ $produto->codigo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.produtos.fields.produto')</th>
                            <td field-key='produto'>{{ $produto->produto }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.produtos.fields.granulometria')</th>
                            <td field-key='granulometria'>{{ $produto->granulometria }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#especificacao" aria-controls="especificacao" role="tab" data-toggle="tab">Especificação </a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="especificacao">
<table class="table table-bordered table-striped {{ count($especificacaos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.especificacao.fields.codigo')</th>
                        <th>@lang('quickadmin.especificacao.fields.data')</th>
                        <th>@lang('quickadmin.especificacao.fields.requisito-iso')</th>
                        <th>@lang('quickadmin.especificacao.fields.nome-cliente')</th>
                        <th>@lang('quickadmin.especificacao.fields.cd-produto')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($especificacaos) > 0)
            @foreach ($especificacaos as $especificacao)
                <tr data-entry-id="{{ $especificacao->id }}">
                    <td field-key='codigo'>{{ $especificacao->codigo }}</td>
                                <td field-key='data'>{{ $especificacao->data }}</td>
                                <td field-key='requisito_iso'>{{ $especificacao->requisito_iso }}</td>
                                <td field-key='nome_cliente'>{{ $especificacao->nome_cliente->nome_cliente or '' }}</td>
                                <td field-key='cd_produto'>{{ $especificacao->cd_produto->codigo or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('especificacao_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.especificacaos.restore', $especificacao->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('especificacao_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.especificacaos.perma_del', $especificacao->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('especificacao_view')
                                    <a href="{{ route('admin.especificacaos.show',[$especificacao->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('especificacao_edit')
                                    <a href="{{ route('admin.especificacaos.edit',[$especificacao->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('especificacao_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.especificacaos.destroy', $especificacao->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.produtos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


