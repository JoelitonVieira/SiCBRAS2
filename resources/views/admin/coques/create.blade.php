@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.coque.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.coques.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data_recebimento', trans('quickadmin.coque.fields.data-recebimento').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data_recebimento', old('data_recebimento'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('data_recebimento'))
                        <p class="help-block">
                            {{ $errors->first('data_recebimento') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data_expedicao', trans('quickadmin.coque.fields.data-expedicao').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data_expedicao', old('data_expedicao'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('data_expedicao'))
                        <p class="help-block">
                            {{ $errors->first('data_expedicao') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('transportadora', trans('quickadmin.coque.fields.transportadora').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('transportadora', old('transportadora'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('transportadora'))
                        <p class="help-block">
                            {{ $errors->first('transportadora') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fornecedor_id', trans('quickadmin.coque.fields.fornecedor').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('nota_fiscal', trans('quickadmin.coque.fields.nota-fiscal').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nota_fiscal', old('nota_fiscal'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nota_fiscal'))
                        <p class="help-block">
                            {{ $errors->first('nota_fiscal') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cte', trans('quickadmin.coque.fields.cte').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('peso_nf', trans('quickadmin.coque.fields.peso-nf').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('peso_sicbras', trans('quickadmin.coque.fields.peso-sicbras').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('diferenca', trans('quickadmin.coque.fields.diferenca').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('rs_acordo', trans('quickadmin.coque.fields.rs-acordo').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('rs_acordo', old('rs_acordo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rs_acordo'))
                        <p class="help-block">
                            {{ $errors->first('rs_acordo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cambio', trans('quickadmin.coque.fields.cambio').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('cambio', old('cambio'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cambio'))
                        <p class="help-block">
                            {{ $errors->first('cambio') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dolar_acordo', trans('quickadmin.coque.fields.dolar-acordo').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('dolar_acordo', old('dolar_acordo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dolar_acordo'))
                        <p class="help-block">
                            {{ $errors->first('dolar_acordo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('valor_nota', trans('quickadmin.coque.fields.valor-nota').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('valor_nota', old('valor_nota'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('valor_nota'))
                        <p class="help-block">
                            {{ $errors->first('valor_nota') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rs_real_imposto', trans('quickadmin.coque.fields.rs-real-imposto').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('rs_real_imposto', old('rs_real_imposto'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rs_real_imposto'))
                        <p class="help-block">
                            {{ $errors->first('rs_real_imposto') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('icms', trans('quickadmin.coque.fields.icms').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('icms', old('icms'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('icms'))
                        <p class="help-block">
                            {{ $errors->first('icms') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pis_confins', trans('quickadmin.coque.fields.pis-confins').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('pis_confins', old('pis_confins'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pis_confins'))
                        <p class="help-block">
                            {{ $errors->first('pis_confins') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ipi', trans('quickadmin.coque.fields.ipi').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('ipi', old('ipi'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ipi'))
                        <p class="help-block">
                            {{ $errors->first('ipi') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('encargo_30', trans('quickadmin.coque.fields.encargo-30').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('encargo_30', old('encargo_30'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('encargo_30'))
                        <p class="help-block">
                            {{ $errors->first('encargo_30') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rs_real_semimposto', trans('quickadmin.coque.fields.rs-real-semimposto').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('rs_real_semimposto', old('rs_real_semimposto'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rs_real_semimposto'))
                        <p class="help-block">
                            {{ $errors->first('rs_real_semimposto') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dolar_sem_imposto', trans('quickadmin.coque.fields.dolar-sem-imposto').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('dolar_sem_imposto', old('dolar_sem_imposto'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dolar_sem_imposto'))
                        <p class="help-block">
                            {{ $errors->first('dolar_sem_imposto') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('valor_frete', trans('quickadmin.coque.fields.valor-frete').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('rs_frete', trans('quickadmin.coque.fields.rs-frete').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('saldo_retirar', trans('quickadmin.coque.fields.saldo-retirar').'*', ['class' => 'control-label']) !!}
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