@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.composicao-fisica.title')</h3>
    
    {!! Form::model($composicao_fisica, ['method' => 'PUT', 'route' => ['admin.composicao_fisicas.update', $composicao_fisica->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('granulometria', trans('quickadmin.composicao-fisica.fields.granulometria').'', ['class' => 'control-label']) !!}
                    {!! Form::text('granulometria', old('granulometria'), ['class' => 'form-control', 'placeholder' => 'Composição Física']) !!}
                    <p class="help-block">Composição Física</p>
                    @if($errors->has('granulometria'))
                        <p class="help-block">
                            {{ $errors->first('granulometria') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('maximo', trans('quickadmin.composicao-fisica.fields.maximo').'', ['class' => 'control-label']) !!}
                    {!! Form::text('maximo', old('maximo'), ['class' => 'form-control', 'placeholder' => 'Maximo']) !!}
                    <p class="help-block">Maximo</p>
                    @if($errors->has('maximo'))
                        <p class="help-block">
                            {{ $errors->first('maximo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('minimo', trans('quickadmin.composicao-fisica.fields.minimo').'', ['class' => 'control-label']) !!}
                    {!! Form::text('minimo', old('minimo'), ['class' => 'form-control', 'placeholder' => 'Minimo']) !!}
                    <p class="help-block">Minimo</p>
                    @if($errors->has('minimo'))
                        <p class="help-block">
                            {{ $errors->first('minimo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cd_especificacao_id', trans('quickadmin.composicao-fisica.fields.cd-especificacao').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('cd_especificacao_id', $cd_especificacaos, old('cd_especificacao_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block">Código Especificação</p>
                    @if($errors->has('cd_especificacao_id'))
                        <p class="help-block">
                            {{ $errors->first('cd_especificacao_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

