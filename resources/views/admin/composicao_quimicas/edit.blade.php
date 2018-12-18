@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.composicao-quimica.title')</h3>
    
    {!! Form::model($composicao_quimica, ['method' => 'PUT', 'route' => ['admin.composicao_quimicas.update', $composicao_quimica->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comp', trans('quickadmin.composicao-quimica.fields.comp').'', ['class' => 'control-label']) !!}
                    {!! Form::text('comp', old('comp'), ['class' => 'form-control', 'placeholder' => 'Composição ']) !!}
                    <p class="help-block">Composição </p>
                    @if($errors->has('comp'))
                        <p class="help-block">
                            {{ $errors->first('comp') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('max', trans('quickadmin.composicao-quimica.fields.max').'', ['class' => 'control-label']) !!}
                    {!! Form::text('max', old('max'), ['class' => 'form-control', 'placeholder' => 'Maximo']) !!}
                    <p class="help-block">Maximo</p>
                    @if($errors->has('max'))
                        <p class="help-block">
                            {{ $errors->first('max') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('minimo', trans('quickadmin.composicao-quimica.fields.minimo').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('cd_especificacao_id', trans('quickadmin.composicao-quimica.fields.cd-especificacao').'*', ['class' => 'control-label']) !!}
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

