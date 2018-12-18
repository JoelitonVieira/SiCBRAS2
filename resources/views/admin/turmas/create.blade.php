@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.turma.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.turmas.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_treinamento', trans('quickadmin.turma.fields.nome-treinamento').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_treinamento', old('nome_treinamento'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_treinamento'))
                        <p class="help-block">
                            {{ $errors->first('nome_treinamento') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

