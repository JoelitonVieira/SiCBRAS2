@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pasta-a-frio-ou-briquete.title')</h3>
    
    {!! Form::model($pasta_a_frio_ou_briquete, ['method' => 'PUT', 'route' => ['admin.pasta_a_frio_ou_briquetes.update', $pasta_a_frio_ou_briquete->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('materia_prima', trans('quickadmin.pasta-a-frio-ou-briquete.fields.materia-prima').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('data', trans('quickadmin.pasta-a-frio-ou-briquete.fields.data').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('num_nf', trans('quickadmin.pasta-a-frio-ou-briquete.fields.num-nf').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('transportadora', trans('quickadmin.pasta-a-frio-ou-briquete.fields.transportadora').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('fornecedor_id', trans('quickadmin.pasta-a-frio-ou-briquete.fields.fornecedor').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('quantidade', trans('quickadmin.pasta-a-frio-ou-briquete.fields.quantidade').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('quantidade', old('quantidade'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantidade'))
                        <p class="help-block">
                            {{ $errors->first('quantidade') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('entrada_acumulada', trans('quickadmin.pasta-a-frio-ou-briquete.fields.entrada-acumulada').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('entrada_acumulada', old('entrada_acumulada'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('entrada_acumulada'))
                        <p class="help-block">
                            {{ $errors->first('entrada_acumulada') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('observacoes', trans('quickadmin.pasta-a-frio-ou-briquete.fields.observacoes').'*', ['class' => 'control-label']) !!}
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
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop