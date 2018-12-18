@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.departamentos.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.departamentos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_departamento', trans('quickadmin.departamentos.fields.nome-departamento').'', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_departamento', old('nome_departamento'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_departamento'))
                        <p class="help-block">
                            {{ $errors->first('nome_departamento') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

