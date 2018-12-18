@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.produtos.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.produtos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('codigo', trans('quickadmin.produtos.fields.codigo').'', ['class' => 'control-label']) !!}
                    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control', 'placeholder' => 'Codigo']) !!}
                    <p class="help-block">Codigo</p>
                    @if($errors->has('codigo'))
                        <p class="help-block">
                            {{ $errors->first('codigo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('produto', trans('quickadmin.produtos.fields.produto').'', ['class' => 'control-label']) !!}
                    {!! Form::text('produto', old('produto'), ['class' => 'form-control', 'placeholder' => 'Produto']) !!}
                    <p class="help-block">Produto</p>
                    @if($errors->has('produto'))
                        <p class="help-block">
                            {{ $errors->first('produto') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('granulometria', trans('quickadmin.produtos.fields.granulometria').'', ['class' => 'control-label']) !!}
                    {!! Form::text('granulometria', old('granulometria'), ['class' => 'form-control', 'placeholder' => 'Granulometria']) !!}
                    <p class="help-block">Granulometria</p>
                    @if($errors->has('granulometria'))
                        <p class="help-block">
                            {{ $errors->first('granulometria') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

