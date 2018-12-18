@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.fornecedor.title')</h3>
    
    {!! Form::model($fornecedor, ['method' => 'PUT', 'route' => ['admin.fornecedors.update', $fornecedor->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_fantasia', trans('quickadmin.fornecedor.fields.nome-fantasia').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_fantasia', old('nome_fantasia'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_fantasia'))
                        <p class="help-block">
                            {{ $errors->first('nome_fantasia') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('matprima_fornecida', trans('quickadmin.fornecedor.fields.matprima-fornecida').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('matprima_fornecida', old('matprima_fornecida'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('matprima_fornecida'))
                        <p class="help-block">
                            {{ $errors->first('matprima_fornecida') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telefone', trans('quickadmin.fornecedor.fields.telefone').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('email', trans('quickadmin.fornecedor.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

