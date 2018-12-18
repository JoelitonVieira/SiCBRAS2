@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pasta-a-frio-e-briquete-saida.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.pasta_a_frio_e_briquete_saidas.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('materia_prima', trans('quickadmin.pasta-a-frio-e-briquete-saida.fields.materia-prima').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('materia_prima'))
                        <p class="help-block">
                            {{ $errors->first('materia_prima') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('materia_prima', 'Pasta a Frio', false, ['required' => '']) !!}
                            Pasta a Frio
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('materia_prima', 'Pasta Briquete', false, ['required' => '']) !!}
                            Pasta Briquete
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.pasta-a-frio-e-briquete-saida.fields.data').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('lider_saida', trans('quickadmin.pasta-a-frio-e-briquete-saida.fields.lider-saida').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lider_saida', old('lider_saida'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lider_saida'))
                        <p class="help-block">
                            {{ $errors->first('lider_saida') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('forno_saida', trans('quickadmin.pasta-a-frio-e-briquete-saida.fields.forno-saida').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('forno_saida'))
                        <p class="help-block">
                            {{ $errors->first('forno_saida') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('forno_saida', 'F1', false, ['required' => '']) !!}
                            F1
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('forno_saida', 'F2', false, ['required' => '']) !!}
                            F2
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('forno_saida', 'F3', false, ['required' => '']) !!}
                            F3
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('forno_saida', 'F4', false, ['required' => '']) !!}
                            F4
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('operacao', trans('quickadmin.pasta-a-frio-e-briquete-saida.fields.operacao').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('operacao', old('operacao'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('operacao'))
                        <p class="help-block">
                            {{ $errors->first('operacao') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('saida', trans('quickadmin.pasta-a-frio-e-briquete-saida.fields.saida').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('saida_acumulada', trans('quickadmin.pasta-a-frio-e-briquete-saida.fields.saida-acumulada').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('observacoes', trans('quickadmin.pasta-a-frio-e-briquete-saida.fields.observacoes').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('observacoes', old('observacoes'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('observacoes'))
                        <p class="help-block">
                            {{ $errors->first('observacoes') }}
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