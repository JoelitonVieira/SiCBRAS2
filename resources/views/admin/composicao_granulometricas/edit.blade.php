@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.composicao-granulometrica.title')</h3>
    
    {!! Form::model($composicao_granulometrica, ['method' => 'PUT', 'route' => ['admin.composicao_granulometricas.update', $composicao_granulometrica->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telas', trans('quickadmin.composicao-granulometrica.fields.telas').'', ['class' => 'control-label']) !!}
                    {!! Form::text('telas', old('telas'), ['class' => 'form-control', 'placeholder' => 'Telas']) !!}
                    <p class="help-block">Telas</p>
                    @if($errors->has('telas'))
                        <p class="help-block">
                            {{ $errors->first('telas') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('maximo', trans('quickadmin.composicao-granulometrica.fields.maximo').'', ['class' => 'control-label']) !!}
                    {!! Form::text('maximo', old('maximo'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('maximo'))
                        <p class="help-block">
                            {{ $errors->first('maximo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('minimo', trans('quickadmin.composicao-granulometrica.fields.minimo').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('cd_especificacao_id', trans('quickadmin.composicao-granulometrica.fields.cd-especificacao').'*', ['class' => 'control-label']) !!}
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

