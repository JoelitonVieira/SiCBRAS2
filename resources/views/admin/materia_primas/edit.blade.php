@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.materia-prima.title')</h3>
    
    {!! Form::model($materia_prima, ['method' => 'PUT', 'route' => ['admin.materia_primas.update', $materia_prima->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cod_matprima', trans('quickadmin.materia-prima.fields.cod-matprima').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('cod_matprima', old('cod_matprima'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cod_matprima'))
                        <p class="help-block">
                            {{ $errors->first('cod_matprima') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_matprima', trans('quickadmin.materia-prima.fields.nome-matprima').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_matprima', old('nome_matprima'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_matprima'))
                        <p class="help-block">
                            {{ $errors->first('nome_matprima') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

