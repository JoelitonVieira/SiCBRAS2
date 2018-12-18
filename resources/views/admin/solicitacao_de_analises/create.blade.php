@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.solicitacao-de-analise.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.solicitacao_de_analises.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('turnos', trans('quickadmin.solicitacao-de-analise.fields.turnos').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('turnos'))
                        <p class="help-block">
                            {{ $errors->first('turnos') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('turnos', '6-14', false, ['required' => '']) !!}
                            6-14
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('turnos', '14-22', false, ['required' => '']) !!}
                            14-22
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('turnos', '22-6', false, ['required' => '']) !!}
                            22-6
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('turnos', 'Administrador ', false, ['required' => '']) !!}
                            Administrador 
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_resp_amostragem', trans('quickadmin.solicitacao-de-analise.fields.nome-resp-amostragem').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_resp_amostragem', old('nome_resp_amostragem'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_resp_amostragem'))
                        <p class="help-block">
                            {{ $errors->first('nome_resp_amostragem') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mat_primas', trans('quickadmin.solicitacao-de-analise.fields.mat-primas').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mat_primas'))
                        <p class="help-block">
                            {{ $errors->first('mat_primas') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('mat_primas', 'Coque', false, ['required' => '']) !!}
                            Coque
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('mat_primas', 'Areia', false, ['required' => '']) !!}
                            Areia
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lote_ano', trans('quickadmin.solicitacao-de-analise.fields.lote-ano').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lote_ano', old('lote_ano'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lote_ano'))
                        <p class="help-block">
                            {{ $errors->first('lote_ano') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tipos_graf', trans('quickadmin.solicitacao-de-analise.fields.tipos-graf').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tipos_graf'))
                        <p class="help-block">
                            {{ $errors->first('tipos_graf') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('tipos_graf', 'Grafite Sintético', false, ['required' => '']) !!}
                            Grafite Sintético 
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('tipos_graf', 'Grafite Homogênea', false, ['required' => '']) !!}
                            Grafite Homogênea
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('tipos_graf', 'Grafite Recirculada', false, ['required' => '']) !!}
                            Grafite Recirculada
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('n_op', trans('quickadmin.solicitacao-de-analise.fields.n-op').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('n_op', old('n_op'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('n_op'))
                        <p class="help-block">
                            {{ $errors->first('n_op') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('forno', trans('quickadmin.solicitacao-de-analise.fields.forno').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('forno', old('forno'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('forno'))
                        <p class="help-block">
                            {{ $errors->first('forno') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fornecedor_id', trans('quickadmin.solicitacao-de-analise.fields.fornecedor').'', ['class' => 'control-label']) !!}
                    {!! Form::select('fornecedor_id', $fornecedors, old('fornecedor_id'), ['class' => 'form-control select2']) !!}
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
                    {!! Form::label('origem', trans('quickadmin.solicitacao-de-analise.fields.origem').'', ['class' => 'control-label']) !!}
                    {!! Form::text('origem', old('origem'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('origem'))
                        <p class="help-block">
                            {{ $errors->first('origem') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tipos_de_misturas', trans('quickadmin.solicitacao-de-analise.fields.tipos-de-misturas').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tipos_de_misturas'))
                        <p class="help-block">
                            {{ $errors->first('tipos_de_misturas') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('tipos_de_misturas', 'Mistura Virgem', false, ['required' => '']) !!}
                            Mistura Virgem
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('tipos_de_misturas', 'Mistura Recirculada Acima U', false, ['required' => '']) !!}
                            Mistura Recirculada Acima U
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('tipos_de_misturas', 'Mistura Recirculada Abaixo U', false, ['required' => '']) !!}
                            Mistura Recirculada Abaixo U
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('numero_operacao', trans('quickadmin.solicitacao-de-analise.fields.numero-operacao').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('numero_operacao', old('numero_operacao'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('numero_operacao'))
                        <p class="help-block">
                            {{ $errors->first('numero_operacao') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fornos_das_misturas', trans('quickadmin.solicitacao-de-analise.fields.fornos-das-misturas').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('fornos_das_misturas', old('fornos_das_misturas'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fornos_das_misturas'))
                        <p class="help-block">
                            {{ $errors->first('fornos_das_misturas') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('amostra_teste', trans('quickadmin.solicitacao-de-analise.fields.amostra-teste').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('amostra_teste'))
                        <p class="help-block">
                            {{ $errors->first('amostra_teste') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('amostra_teste', 'Sim', false, ['required' => '']) !!}
                            Sim
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('amostra_teste', 'Não', false, ['required' => '']) !!}
                            Não
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('material', trans('quickadmin.solicitacao-de-analise.fields.material').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('material', old('material'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('material'))
                        <p class="help-block">
                            {{ $errors->first('material') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('identificacao_da_amostra', trans('quickadmin.solicitacao-de-analise.fields.identificacao-da-amostra').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('identificacao_da_amostra', old('identificacao_da_amostra'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('identificacao_da_amostra'))
                        <p class="help-block">
                            {{ $errors->first('identificacao_da_amostra') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

