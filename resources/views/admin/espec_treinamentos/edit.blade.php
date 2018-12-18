@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.espec-treinamento.title')</h3>
    
    {!! Form::model($espec_treinamento, ['method' => 'PUT', 'route' => ['admin.espec_treinamentos.update', $espec_treinamento->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_espectreinamento', trans('quickadmin.espec-treinamento.fields.nome-espectreinamento').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_espectreinamento', old('nome_espectreinamento'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_espectreinamento'))
                        <p class="help-block">
                            {{ $errors->first('nome_espectreinamento') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

