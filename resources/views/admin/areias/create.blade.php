@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.areia.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.areias.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.areia.fields.data').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('fornecedor_id', trans('quickadmin.areia.fields.fornecedor').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('fornecedor_id', $fornecedors, old('fornecedor_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fornecedor_id'))
                        <p class="help-block">
                            {{ $errors->first('fornecedor_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('num_nf', trans('quickadmin.areia.fields.num-nf').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('num_nf', old('num_nf'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('num_nf'))
                        <p class="help-block">
                            {{ $errors->first('num_nf') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cte', trans('quickadmin.areia.fields.cte').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('cte', old('cte'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cte'))
                        <p class="help-block">
                            {{ $errors->first('cte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('peso_nf', trans('quickadmin.areia.fields.peso-nf').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('peso_nf', old('peso_nf'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('peso_nf'))
                        <p class="help-block">
                            {{ $errors->first('peso_nf') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('peso_sicbras', trans('quickadmin.areia.fields.peso-sicbras').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('peso_sicbras', old('peso_sicbras'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('peso_sicbras'))
                        <p class="help-block">
                            {{ $errors->first('peso_sicbras') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('diferenca', trans('quickadmin.areia.fields.diferenca').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('diferenca', old('diferenca'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('diferenca'))
                        <p class="help-block">
                            {{ $errors->first('diferenca') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('valor_prod', trans('quickadmin.areia.fields.valor-prod').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('valor_prod', old('valor_prod'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('valor_prod'))
                        <p class="help-block">
                            {{ $errors->first('valor_prod') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('valor_frete', trans('quickadmin.areia.fields.valor-frete').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('valor_frete', old('valor_frete'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('valor_frete'))
                        <p class="help-block">
                            {{ $errors->first('valor_frete') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rs_areia', trans('quickadmin.areia.fields.rs-areia').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('rs_areia', old('rs_areia'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rs_areia'))
                        <p class="help-block">
                            {{ $errors->first('rs_areia') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rs_frete', trans('quickadmin.areia.fields.rs-frete').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('rs_frete', old('rs_frete'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rs_frete'))
                        <p class="help-block">
                            {{ $errors->first('rs_frete') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('saldo_retirar', trans('quickadmin.areia.fields.saldo-retirar').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('saldo_retirar', old('saldo_retirar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('saldo_retirar'))
                        <p class="help-block">
                            {{ $errors->first('saldo_retirar') }}
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