@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.resultados-fisico.title')</h3>
    
    {!! Form::model($resultados_fisico, ['method' => 'PUT', 'route' => ['admin.resultados_fisicos.update', $resultados_fisico->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('resultado_pesado', trans('quickadmin.resultados-fisico.fields.resultado-pesado').'', ['class' => 'control-label']) !!}
                    {!! Form::text('resultado_pesado', old('resultado_pesado'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('resultado_pesado'))
                        <p class="help-block">
                            {{ $errors->first('resultado_pesado') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('resultado_encontrado', trans('quickadmin.resultados-fisico.fields.resultado-encontrado').'', ['class' => 'control-label']) !!}
                    {!! Form::text('resultado_encontrado', old('resultado_encontrado'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('resultado_encontrado'))
                        <p class="help-block">
                            {{ $errors->first('resultado_encontrado') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nr_analise_id', trans('quickadmin.resultados-fisico.fields.nr-analise').'', ['class' => 'control-label']) !!}
                    {!! Form::select('nr_analise_id', $nr_analises, old('nr_analise_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block">N° Analise Física</p>
                    @if($errors->has('nr_analise_id'))
                        <p class="help-block">
                            {{ $errors->first('nr_analise_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

