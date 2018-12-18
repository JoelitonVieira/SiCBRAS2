@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.cargos.title')</h3>
    
    {!! Form::model($cargo, ['method' => 'PUT', 'route' => ['admin.cargos.update', $cargo->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_cargo', trans('quickadmin.cargos.fields.nome-cargo').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_cargo', old('nome_cargo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_cargo'))
                        <p class="help-block">
                            {{ $errors->first('nome_cargo') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

