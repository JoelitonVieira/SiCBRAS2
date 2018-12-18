@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.solicitar-amostra.title')</h3>
    
    {!! Form::model($solicitar_amostra, ['method' => 'PUT', 'route' => ['admin.solicitar_amostras.update', $solicitar_amostra->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('setor', trans('quickadmin.solicitar-amostra.fields.setor').'', ['class' => 'control-label']) !!}
                    {!! Form::text('setor', old('setor'), ['class' => 'form-control', 'placeholder' => 'Setor']) !!}
                    <p class="help-block">Setor</p>
                    @if($errors->has('setor'))
                        <p class="help-block">
                            {{ $errors->first('setor') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.solicitar-amostra.fields.data').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data', old('data'), ['class' => 'form-control datetime', 'placeholder' => 'Data', 'required' => '']) !!}
                    <p class="help-block">Data</p>
                    @if($errors->has('data'))
                        <p class="help-block">
                            {{ $errors->first('data') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('equipamento', trans('quickadmin.solicitar-amostra.fields.equipamento').'', ['class' => 'control-label']) !!}
                    {!! Form::text('equipamento', old('equipamento'), ['class' => 'form-control', 'placeholder' => 'Equipamento']) !!}
                    <p class="help-block">Equipamento</p>
                    @if($errors->has('equipamento'))
                        <p class="help-block">
                            {{ $errors->first('equipamento') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('amostra', trans('quickadmin.solicitar-amostra.fields.amostra').'*', ['class' => 'control-label']) !!}
                    <p class="help-block">Adicione Tipo</p>
                    @if($errors->has('amostra'))
                        <p class="help-block">
                            {{ $errors->first('amostra') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('amostra', 'Acabado', false, ['required' => '']) !!}
                            Acabado
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('amostra', 'Semi-acabado', false, ['required' => '']) !!}
                            Semi-acabado
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('amostra', 'Teste', false, ['required' => '']) !!}
                            Teste
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('responsavel', trans('quickadmin.solicitar-amostra.fields.responsavel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('responsavel', old('responsavel'), ['class' => 'form-control', 'placeholder' => 'Responsavel']) !!}
                    <p class="help-block">Responsavel</p>
                    @if($errors->has('responsavel'))
                        <p class="help-block">
                            {{ $errors->first('responsavel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('referencia', trans('quickadmin.solicitar-amostra.fields.referencia').'', ['class' => 'control-label']) !!}
                    {!! Form::text('referencia', old('referencia'), ['class' => 'form-control', 'placeholder' => 'informe referencia ']) !!}
                    <p class="help-block">informe referencia </p>
                    @if($errors->has('referencia'))
                        <p class="help-block">
                            {{ $errors->first('referencia') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('alimentacao', trans('quickadmin.solicitar-amostra.fields.alimentacao').'', ['class' => 'control-label']) !!}
                    {!! Form::text('alimentacao', old('alimentacao'), ['class' => 'form-control', 'placeholder' => 'informe alimentação']) !!}
                    <p class="help-block">informe alimentação</p>
                    @if($errors->has('alimentacao'))
                        <p class="help-block">
                            {{ $errors->first('alimentacao') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('od_producao', trans('quickadmin.solicitar-amostra.fields.od-producao').'', ['class' => 'control-label']) !!}
                    {!! Form::text('od_producao', old('od_producao'), ['class' => 'form-control', 'placeholder' => 'Ordem de Produção']) !!}
                    <p class="help-block">Ordem de Produção</p>
                    @if($errors->has('od_producao'))
                        <p class="help-block">
                            {{ $errors->first('od_producao') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bag_pallet', trans('quickadmin.solicitar-amostra.fields.bag-pallet').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bag_pallet', old('bag_pallet'), ['class' => 'form-control', 'placeholder' => 'N° Bag/Pallet']) !!}
                    <p class="help-block">N° Bag/Pallet</p>
                    @if($errors->has('bag_pallet'))
                        <p class="help-block">
                            {{ $errors->first('bag_pallet') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('peso', trans('quickadmin.solicitar-amostra.fields.peso').'', ['class' => 'control-label']) !!}
                    {!! Form::number('peso', old('peso'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('peso'))
                        <p class="help-block">
                            {{ $errors->first('peso') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cd_especificacao_id', trans('quickadmin.solicitar-amostra.fields.cd-especificacao').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('cd_especificacao_id', $cd_especificacaos, old('cd_especificacao_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block">Código Especificação</p>
                    @if($errors->has('cd_especificacao_id'))
                        <p class="help-block">
                            {{ $errors->first('cd_especificacao_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
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
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop