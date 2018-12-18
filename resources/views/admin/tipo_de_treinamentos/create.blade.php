@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tipo-de-treinamento.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.tipo_de_treinamentos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_tipo_treinamento', trans('quickadmin.tipo-de-treinamento.fields.nome-tipo-treinamento').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_tipo_treinamento', old('nome_tipo_treinamento'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_tipo_treinamento'))
                        <p class="help-block">
                            {{ $errors->first('nome_tipo_treinamento') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

