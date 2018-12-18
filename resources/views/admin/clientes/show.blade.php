@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clientes.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.clientes.fields.nome-cliente')</th>
                            <td field-key='nome_cliente'>{{ $cliente->nome_cliente }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clientes.fields.cpf')</th>
                            <td field-key='cpf'>{{ $cliente->cpf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clientes.fields.cnpj')</th>
                            <td field-key='cnpj'>{{ $cliente->cnpj }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clientes.fields.email-cliente')</th>
                            <td field-key='email_cliente'>{{ $cliente->email_cliente }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clientes.fields.telefone')</th>
                            <td field-key='telefone'>{{ $cliente->telefone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clientes.fields.cep')</th>
                            <td>
                    <strong>{{ $cliente->cep_address }}</strong>
                    <div id='cep-map' style='width: 600px;height: 300px;' class='map' data-key='cep' data-latitude='{{$cliente->cep_latitude}}' data-longitude='{{$cliente->cep_longitude}}'></div>
                </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#contato" aria-controls="contato" role="tab" data-toggle="tab">Contato</a></li>
<li role="presentation" class=""><a href="#especificacao" aria-controls="especificacao" role="tab" data-toggle="tab">Especificação </a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="contato">
<table class="table table-bordered table-striped {{ count($contatos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.contato.fields.telefone-2')</th>
                        <th>@lang('quickadmin.contato.fields.email-2')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($contatos) > 0)
            @foreach ($contatos as $contato)
                <tr data-entry-id="{{ $contato->id }}">
                    <td field-key='telefone_2'>{{ $contato->telefone_2 }}</td>
                                <td field-key='email_2'>{{ $contato->email_2 }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('contato_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.contatos.restore', $contato->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('contato_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.contatos.perma_del', $contato->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('contato_view')
                                    <a href="{{ route('admin.contatos.show',[$contato->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('contato_edit')
                                    <a href="{{ route('admin.contatos.edit',[$contato->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('contato_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.contatos.destroy', $contato->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="especificacao">
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

            <a href="{{ route('admin.clientes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent
   <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
 
    <script>
        function initialize() {
            const maps = document.getElementsByClassName("map");
            for (let i = 0; i < maps.length; i++) {
                const field = maps[i]
                const fieldKey = field.dataset.key;
                const latitude = parseFloat(field.dataset.latitude) || -33.8688;
                const longitude = parseFloat(field.dataset.longitude) || 151.2195;
        
                const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                    center: {lat: latitude, lng: longitude},
                    zoom: 13
                });
                const marker = new google.maps.Marker({
                    map: map,
                    position: {lat: latitude, lng: longitude},
                });
        
                marker.setVisible(true);
            }    
              
          }
    </script>
@stop
