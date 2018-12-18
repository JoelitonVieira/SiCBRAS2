@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clientes.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.clientes.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_cliente', trans('quickadmin.clientes.fields.nome-cliente').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_cliente', old('nome_cliente'), ['class' => 'form-control', 'placeholder' => 'Informe razão social ', 'required' => '']) !!}
                    <p class="help-block">Informe razão social </p>
                    @if($errors->has('nome_cliente'))
                        <p class="help-block">
                            {{ $errors->first('nome_cliente') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cpf', trans('quickadmin.clientes.fields.cpf').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cpf', old('cpf'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cpf'))
                        <p class="help-block">
                            {{ $errors->first('cpf') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cnpj', trans('quickadmin.clientes.fields.cnpj').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cnpj', old('cnpj'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cnpj'))
                        <p class="help-block">
                            {{ $errors->first('cnpj') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email_cliente', trans('quickadmin.clientes.fields.email-cliente').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email_cliente', old('email_cliente'), ['class' => 'form-control', 'placeholder' => 'Informe o email', 'required' => '']) !!}
                    <p class="help-block">Informe o email</p>
                    @if($errors->has('email_cliente'))
                        <p class="help-block">
                            {{ $errors->first('email_cliente') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telefone', trans('quickadmin.clientes.fields.telefone').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('telefone', old('telefone'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('telefone'))
                        <p class="help-block">
                            {{ $errors->first('telefone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cep_address', trans('quickadmin.clientes.fields.cep').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('cep_address', old('cep_address'), ['class' => 'form-control map-input', 'id' => 'cep-input', 'required' => '']) !!}
                    {!! Form::hidden('cep_latitude', 0 , ['id' => 'cep-latitude']) !!}
                    {!! Form::hidden('cep_longitude', 0 , ['id' => 'cep-longitude']) !!}
                    <p class="help-block">Informe o CEP</p>
                    @if($errors->has('cep'))
                        <p class="help-block">
                            {{ $errors->first('cep') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div id="cep-map-container" style="width:100%;height:200px; ">
                <div style="width: 100%; height: 100%" id="cep-map"></div>
            </div>
            @if(!env('GOOGLE_MAPS_API_KEY'))
                <b>'GOOGLE_MAPS_API_KEY' is not set in the .env</b>
            @endif
            
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Contato
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.contato.fields.telefone-2')</th>
                        <th>@lang('quickadmin.contato.fields.email-2')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="contato">
                    @foreach(old('contatos', []) as $index => $data)
                        @include('admin.clientes.contatos_row', [
                            'index' => $index
                        ])
                    @endforeach
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
   <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
   <script src="/adminlte/js/mapInput.js"></script>

    <script type="text/html" id="contato-template">
        @include('admin.clientes.contatos_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

            <script>
        $('.add-new').click(function () {
            var tableBody = $(this).parent().find('tbody');
            var template = $('#' + tableBody.attr('id') + '-template').html();
            var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
            if (isNaN(lastIndex)) {
                lastIndex = 0;
            }
            tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
            return false;
        });
        $(document).on('click', '.remove', function () {
            var row = $(this).parentsUntil('tr').parent();
            row.remove();
            return false;
        });
        </script>
@stop