@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.mistura-nova.title')</h3>
    
    {!! Form::model($mistura_nova, ['method' => 'PUT', 'route' => ['admin.mistura_novas.update', $mistura_nova->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.mistura-nova.fields.data').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data', old('data'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('numero_cf', trans('quickadmin.mistura-nova.fields.numero-cf').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('numero_cf', old('numero_cf'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('numero_cf'))
                        <p class="help-block">
                            {{ $errors->first('numero_cf') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('numero_kf', trans('quickadmin.mistura-nova.fields.numero-kf').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('numero_kf', old('numero_kf'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('numero_kf'))
                        <p class="help-block">
                            {{ $errors->first('numero_kf') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('kg_coquebase', trans('quickadmin.mistura-nova.fields.kg-coquebase').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('kg_coquebase', old('kg_coquebase'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('kg_coquebase'))
                        <p class="help-block">
                            {{ $errors->first('kg_coquebase') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('kg_areiabase', trans('quickadmin.mistura-nova.fields.kg-areiabase').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('kg_areiabase', old('kg_areiabase'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('kg_areiabase'))
                        <p class="help-block">
                            {{ $errors->first('kg_areiabase') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('kg_coquereal', trans('quickadmin.mistura-nova.fields.kg-coquereal').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('kg_coquereal', old('kg_coquereal'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('kg_coquereal'))
                        <p class="help-block">
                            {{ $errors->first('kg_coquereal') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('kg_areiareal', trans('quickadmin.mistura-nova.fields.kg-areiareal').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('kg_areiareal', old('kg_areiareal'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('kg_areiareal'))
                        <p class="help-block">
                            {{ $errors->first('kg_areiareal') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mediacoque', trans('quickadmin.mistura-nova.fields.mediacoque').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('mediacoque', old('mediacoque'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mediacoque'))
                        <p class="help-block">
                            {{ $errors->first('mediacoque') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mediaareia', trans('quickadmin.mistura-nova.fields.mediaareia').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('mediaareia', old('mediaareia'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mediaareia'))
                        <p class="help-block">
                            {{ $errors->first('mediaareia') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('num_batelada', trans('quickadmin.mistura-nova.fields.num-batelada').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('num_batelada', old('num_batelada'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('num_batelada'))
                        <p class="help-block">
                            {{ $errors->first('num_batelada') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('turnos', trans('quickadmin.mistura-nova.fields.turnos').'', ['class' => 'control-label']) !!}
                    <p class="help-block">Informe seu turno</p>
                    @if($errors->has('turnos'))
                        <p class="help-block">
                            {{ $errors->first('turnos') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('turnos', '06 - 14', false, []) !!}
                            06 - 14
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('turnos', '14 - 22', false, []) !!}
                            14 - 22 
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('turnos', '22 - 06', false, []) !!}
                            22 - 06 
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('coque_total', trans('quickadmin.mistura-nova.fields.coque-total').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('coque_total', old('coque_total'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('coque_total'))
                        <p class="help-block">
                            {{ $errors->first('coque_total') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('areia_total', trans('quickadmin.mistura-nova.fields.areia-total').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('areia_total', old('areia_total'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('areia_total'))
                        <p class="help-block">
                            {{ $errors->first('areia_total') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_batelada', trans('quickadmin.mistura-nova.fields.total-batelada').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('total_batelada', old('total_batelada'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_batelada'))
                        <p class="help-block">
                            {{ $errors->first('total_batelada') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_misturadia', trans('quickadmin.mistura-nova.fields.total-misturadia').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('total_misturadia', old('total_misturadia'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_misturadia'))
                        <p class="help-block">
                            {{ $errors->first('total_misturadia') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mistura_total', trans('quickadmin.mistura-nova.fields.mistura-total').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('mistura_total', old('mistura_total'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mistura_total'))
                        <p class="help-block">
                            {{ $errors->first('mistura_total') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

