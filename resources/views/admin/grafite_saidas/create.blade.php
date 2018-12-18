@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.grafite-saida.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.grafite_saidas.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.grafite-saida.fields.data').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('nome_lider', trans('quickadmin.grafite-saida.fields.nome-lider').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_lider', old('nome_lider'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_lider'))
                        <p class="help-block">
                            {{ $errors->first('nome_lider') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('forno', trans('quickadmin.grafite-saida.fields.forno').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('operacao', trans('quickadmin.grafite-saida.fields.operacao').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('operacao', old('operacao'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('saida', trans('quickadmin.grafite-saida.fields.saida').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('umidade', trans('quickadmin.grafite-saida.fields.umidade').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('umidade', old('umidade'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('umidade'))
                        <p class="help-block">
                            {{ $errors->first('umidade') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantidade_real', trans('quickadmin.grafite-saida.fields.quantidade-real').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('quantidade_real', old('quantidade_real'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantidade_real'))
                        <p class="help-block">
                            {{ $errors->first('quantidade_real') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('saida_acumulada', trans('quickadmin.grafite-saida.fields.saida-acumulada').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('observacoes', trans('quickadmin.grafite-saida.fields.observacoes').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('observacoes', old('observacoes'), ['class' => 'form-control', 'placeholder' => 'Sintético / Recirculado', 'required' => '']) !!}
                    <p class="help-block">Sintético / Recirculado</p>
                    @if($errors->has('observacoes'))
                        <p class="help-block">
                            {{ $errors->first('observacoes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantidade_bags', trans('quickadmin.grafite-saida.fields.quantidade-bags').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('quantidade_bags', old('quantidade_bags'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantidade_bags'))
                        <p class="help-block">
                            {{ $errors->first('quantidade_bags') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fornecedor_id', trans('quickadmin.grafite-saida.fields.fornecedor').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('fornecedor_id', $fornecedors, old('fornecedor_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fornecedor_id'))
                        <p class="help-block">
                            {{ $errors->first('fornecedor_id') }}
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