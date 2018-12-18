@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contato.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.contatos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telefone_2', trans('quickadmin.contato.fields.telefone-2').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('telefone_2', old('telefone_2'), ['class' => 'form-control', 'placeholder' => 'Telefone de Contato', 'required' => '']) !!}
                    <p class="help-block">Telefone de Contato</p>
                    @if($errors->has('telefone_2'))
                        <p class="help-block">
                            {{ $errors->first('telefone_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email_2', trans('quickadmin.contato.fields.email-2').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('email_2', old('email_2'), ['class' => 'form-control', 'placeholder' => 'Email de Contato', 'required' => '']) !!}
                    <p class="help-block">Email de Contato</p>
                    @if($errors->has('email_2'))
                        <p class="help-block">
                            {{ $errors->first('email_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_cliente_id', trans('quickadmin.contato.fields.nome-cliente').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('nome_cliente_id', $nome_clientes, old('nome_cliente_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block">Cliente</p>
                    @if($errors->has('nome_cliente_id'))
                        <p class="help-block">
                            {{ $errors->first('nome_cliente_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

