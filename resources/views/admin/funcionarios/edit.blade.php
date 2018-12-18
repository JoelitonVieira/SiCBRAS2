@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.funcionarios.title')</h3>
    
    {!! Form::model($funcionario, ['method' => 'PUT', 'route' => ['admin.funcionarios.update', $funcionario->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('numero_matricula', trans('quickadmin.funcionarios.fields.numero-matricula').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('numero_matricula', old('numero_matricula'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('numero_matricula'))
                        <p class="help-block">
                            {{ $errors->first('numero_matricula') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_funcionario', trans('quickadmin.funcionarios.fields.nome-funcionario').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_funcionario', old('nome_funcionario'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_funcionario'))
                        <p class="help-block">
                            {{ $errors->first('nome_funcionario') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_cargo_id', trans('quickadmin.funcionarios.fields.nome-cargo').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('nome_cargo_id', $nome_cargos, old('nome_cargo_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_cargo_id'))
                        <p class="help-block">
                            {{ $errors->first('nome_cargo_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_departamento_id', trans('quickadmin.funcionarios.fields.nome-departamento').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('nome_departamento_id', $nome_departamentos, old('nome_departamento_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_departamento_id'))
                        <p class="help-block">
                            {{ $errors->first('nome_departamento_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_setor_id', trans('quickadmin.funcionarios.fields.nome-setor').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('nome_setor_id', $nome_setors, old('nome_setor_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_setor_id'))
                        <p class="help-block">
                            {{ $errors->first('nome_setor_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('instrutor', trans('quickadmin.funcionarios.fields.instrutor').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('instrutor'))
                        <p class="help-block">
                            {{ $errors->first('instrutor') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('instrutor', 'Sim', false, ['required' => '']) !!}
                            Sim
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('instrutor', 'Não', false, ['required' => '']) !!}
                            Não
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('situacao', trans('quickadmin.funcionarios.fields.situacao').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('situacao'))
                        <p class="help-block">
                            {{ $errors->first('situacao') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('situacao', 'Ativo', false, ['required' => '']) !!}
                            Ativo
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('situacao', 'Inativo', false, ['required' => '']) !!}
                            Inativo
                        </label>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

