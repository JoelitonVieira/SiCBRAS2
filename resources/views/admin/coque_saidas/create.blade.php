@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.coque-saida.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.coque_saidas.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.coque-saida.fields.data').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data', old('data'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('data'))
                        <p class="help-block">
                            {{ $errors->first('data') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lider', trans('quickadmin.coque-saida.fields.lider').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lider', old('lider'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lider'))
                        <p class="help-block">
                            {{ $errors->first('lider') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('forno', trans('quickadmin.coque-saida.fields.forno').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('forno'))
                        <p class="help-block">
                            {{ $errors->first('forno') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('forno', 'F1', false, ['required' => '']) !!}
                            F1
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('forno', 'F2', false, ['required' => '']) !!}
                            F2
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('forno', 'F3', false, ['required' => '']) !!}
                            F3
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('forno', 'F4', false, ['required' => '']) !!}
                            F4
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('saida', trans('quickadmin.coque-saida.fields.saida').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('saida', old('saida'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('saida'))
                        <p class="help-block">
                            {{ $errors->first('saida') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('saida_acumulada', trans('quickadmin.coque-saida.fields.saida-acumulada').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('saida_acumulada', old('saida_acumulada'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('saida_acumulada'))
                        <p class="help-block">
                            {{ $errors->first('saida_acumulada') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('observacao', trans('quickadmin.coque-saida.fields.observacao').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('observacao', old('observacao'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('observacao'))
                        <p class="help-block">
                            {{ $errors->first('observacao') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop