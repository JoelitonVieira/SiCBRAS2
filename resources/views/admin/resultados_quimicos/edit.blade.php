@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.resultados-quimicos.title')</h3>
    
    {!! Form::model($resultados_quimico, ['method' => 'PUT', 'route' => ['admin.resultados_quimicos.update', $resultados_quimico->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.resultados-quimicos.fields.data').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('op_forno', trans('quickadmin.resultados-quimicos.fields.op-forno').'', ['class' => 'control-label']) !!}
                    {!! Form::text('op_forno', old('op_forno'), ['class' => 'form-control', 'placeholder' => 'Op/Forno']) !!}
                    <p class="help-block">Op/Forno</p>
                    @if($errors->has('op_forno'))
                        <p class="help-block">
                            {{ $errors->first('op_forno') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantidade', trans('quickadmin.resultados-quimicos.fields.quantidade').'', ['class' => 'control-label']) !!}
                    {!! Form::number('quantidade', old('quantidade'), ['class' => 'form-control', 'placeholder' => 'Quantidade']) !!}
                    <p class="help-block">Quantidade</p>
                    @if($errors->has('quantidade'))
                        <p class="help-block">
                            {{ $errors->first('quantidade') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('numeracao', trans('quickadmin.resultados-quimicos.fields.numeracao').'', ['class' => 'control-label']) !!}
                    {!! Form::text('numeracao', old('numeracao'), ['class' => 'form-control', 'placeholder' => 'Numeração']) !!}
                    <p class="help-block">Numeração</p>
                    @if($errors->has('numeracao'))
                        <p class="help-block">
                            {{ $errors->first('numeracao') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sic_flourizado', trans('quickadmin.resultados-quimicos.fields.sic-flourizado').'', ['class' => 'control-label']) !!}
                    {!! Form::text('sic_flourizado', old('sic_flourizado'), ['class' => 'form-control', 'placeholder' => 'Sic%(Flourizado)']) !!}
                    <p class="help-block">Sic%(Flourizado)</p>
                    @if($errors->has('sic_flourizado'))
                        <p class="help-block">
                            {{ $errors->first('sic_flourizado') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sic', trans('quickadmin.resultados-quimicos.fields.sic').'', ['class' => 'control-label']) !!}
                    {!! Form::text('sic', old('sic'), ['class' => 'form-control', 'placeholder' => 'Sic%']) !!}
                    <p class="help-block">Sic%</p>
                    @if($errors->has('sic'))
                        <p class="help-block">
                            {{ $errors->first('sic') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ppc', trans('quickadmin.resultados-quimicos.fields.ppc').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ppc', old('ppc'), ['class' => 'form-control', 'placeholder' => 'PPC%']) !!}
                    <p class="help-block">PPC%</p>
                    @if($errors->has('ppc'))
                        <p class="help-block">
                            {{ $errors->first('ppc') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('c_reagido', trans('quickadmin.resultados-quimicos.fields.c-reagido').'', ['class' => 'control-label']) !!}
                    {!! Form::text('c_reagido', old('c_reagido'), ['class' => 'form-control', 'placeholder' => 'C-reagido%']) !!}
                    <p class="help-block">C-reagido%</p>
                    @if($errors->has('c_reagido'))
                        <p class="help-block">
                            {{ $errors->first('c_reagido') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('si_reagido', trans('quickadmin.resultados-quimicos.fields.si-reagido').'', ['class' => 'control-label']) !!}
                    {!! Form::text('si_reagido', old('si_reagido'), ['class' => 'form-control', 'placeholder' => 'Si-reagido%']) !!}
                    <p class="help-block">Si-reagido%</p>
                    @if($errors->has('si_reagido'))
                        <p class="help-block">
                            {{ $errors->first('si_reagido') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('si_livre', trans('quickadmin.resultados-quimicos.fields.si-livre').'', ['class' => 'control-label']) !!}
                    {!! Form::text('si_livre', old('si_livre'), ['class' => 'form-control', 'placeholder' => 'Si-livre%']) !!}
                    <p class="help-block">Si-livre%</p>
                    @if($errors->has('si_livre'))
                        <p class="help-block">
                            {{ $errors->first('si_livre') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sio2', trans('quickadmin.resultados-quimicos.fields.sio2').'', ['class' => 'control-label']) !!}
                    {!! Form::text('sio2', old('sio2'), ['class' => 'form-control', 'placeholder' => 'SiO2%']) !!}
                    <p class="help-block">SiO2%</p>
                    @if($errors->has('sio2'))
                        <p class="help-block">
                            {{ $errors->first('sio2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('si_sio2', trans('quickadmin.resultados-quimicos.fields.si-sio2').'', ['class' => 'control-label']) !!}
                    {!! Form::text('si_sio2', old('si_sio2'), ['class' => 'form-control', 'placeholder' => 'Si + SiO2%']) !!}
                    <p class="help-block">Si + SiO2%</p>
                    @if($errors->has('si_sio2'))
                        <p class="help-block">
                            {{ $errors->first('si_sio2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fe2o3', trans('quickadmin.resultados-quimicos.fields.fe2o3').'', ['class' => 'control-label']) !!}
                    {!! Form::text('fe2o3', old('fe2o3'), ['class' => 'form-control', 'placeholder' => 'Fe2O3%']) !!}
                    <p class="help-block">Fe2O3%</p>
                    @if($errors->has('fe2o3'))
                        <p class="help-block">
                            {{ $errors->first('fe2o3') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('al2o3', trans('quickadmin.resultados-quimicos.fields.al2o3').'', ['class' => 'control-label']) !!}
                    {!! Form::text('al2o3', old('al2o3'), ['class' => 'form-control', 'placeholder' => 'Al2O3%']) !!}
                    <p class="help-block">Al2O3%</p>
                    @if($errors->has('al2o3'))
                        <p class="help-block">
                            {{ $errors->first('al2o3') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cao', trans('quickadmin.resultados-quimicos.fields.cao').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cao', old('cao'), ['class' => 'form-control', 'placeholder' => 'CaO%']) !!}
                    <p class="help-block">CaO%</p>
                    @if($errors->has('cao'))
                        <p class="help-block">
                            {{ $errors->first('cao') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mgo', trans('quickadmin.resultados-quimicos.fields.mgo').'', ['class' => 'control-label']) !!}
                    {!! Form::text('mgo', old('mgo'), ['class' => 'form-control', 'placeholder' => 'MgO%']) !!}
                    <p class="help-block">MgO%</p>
                    @if($errors->has('mgo'))
                        <p class="help-block">
                            {{ $errors->first('mgo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('observa', trans('quickadmin.resultados-quimicos.fields.observa').'', ['class' => 'control-label']) !!}
                    {!! Form::text('observa', old('observa'), ['class' => 'form-control', 'placeholder' => 'Observações']) !!}
                    <p class="help-block">Observações</p>
                    @if($errors->has('observa'))
                        <p class="help-block">
                            {{ $errors->first('observa') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status', trans('quickadmin.resultados-quimicos.fields.status').'*', ['class' => 'control-label']) !!}
                    <p class="help-block">Status</p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('status', 'Aprovado', false, ['required' => '']) !!}
                            Aprovado
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('status', 'Reprovado ', false, ['required' => '']) !!}
                            Reprovado 
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('n_analis_id', trans('quickadmin.resultados-quimicos.fields.n-analis').'', ['class' => 'control-label']) !!}
                    {!! Form::select('n_analis_id', $n_analis, old('n_analis_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block">N° Analise</p>
                    @if($errors->has('n_analis_id'))
                        <p class="help-block">
                            {{ $errors->first('n_analis_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('c_livgre', trans('quickadmin.resultados-quimicos.fields.c-livgre').'', ['class' => 'control-label']) !!}
                    {!! Form::text('c_livgre', old('c_livgre'), ['class' => 'form-control', 'placeholder' => 'C-livre']) !!}
                    <p class="help-block">C-livre</p>
                    @if($errors->has('c_livgre'))
                        <p class="help-block">
                            {{ $errors->first('c_livgre') }}
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