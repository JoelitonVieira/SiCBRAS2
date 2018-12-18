@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.setores.title')</h3>
    
    {!! Form::model($setore, ['method' => 'PUT', 'route' => ['admin.setores.update', $setore->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_setores', trans('quickadmin.setores.fields.nome-setores').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_setores', old('nome_setores'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_setores'))
                        <p class="help-block">
                            {{ $errors->first('nome_setores') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

