@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.treinamento.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.treinamentos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_treinamento_id', trans('quickadmin.treinamento.fields.nome-treinamento').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('nome_treinamento_id', $nome_treinamentos, old('nome_treinamento_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_treinamento_id'))
                        <p class="help-block">
                            {{ $errors->first('nome_treinamento_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('carga_horaria', trans('quickadmin.treinamento.fields.carga-horaria').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('carga_horaria', old('carga_horaria'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('carga_horaria'))
                        <p class="help-block">
                            {{ $errors->first('carga_horaria') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_setores_id', trans('quickadmin.treinamento.fields.nome-setores').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('nome_setores_id', $nome_setores, old('nome_setores_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_setores_id'))
                        <p class="help-block">
                            {{ $errors->first('nome_setores_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data_inicio', trans('quickadmin.treinamento.fields.data-inicio').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data_inicio', old('data_inicio'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('data_inicio'))
                        <p class="help-block">
                            {{ $errors->first('data_inicio') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data_conclusao', trans('quickadmin.treinamento.fields.data-conclusao').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data_conclusao', old('data_conclusao'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('data_conclusao'))
                        <p class="help-block">
                            {{ $errors->first('data_conclusao') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('validadade', trans('quickadmin.treinamento.fields.validadade').'', ['class' => 'control-label']) !!}
                    {!! Form::number('validadade', old('validadade'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('validadade'))
                        <p class="help-block">
                            {{ $errors->first('validadade') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('reciclagem', trans('quickadmin.treinamento.fields.reciclagem').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('reciclagem'))
                        <p class="help-block">
                            {{ $errors->first('reciclagem') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('reciclagem', 'Sim', false, ['required' => '']) !!}
                            Sim
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('reciclagem', 'Não', false, ['required' => '']) !!}
                            Não
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('situacao_turma', trans('quickadmin.treinamento.fields.situacao-turma').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('situacao_turma'))
                        <p class="help-block">
                            {{ $errors->first('situacao_turma') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('situacao_turma', 'Aberta', false, ['required' => '']) !!}
                            Aberta
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('situacao_turma', 'Concluída', false, ['required' => '']) !!}
                            Concluída
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('situacao_turma', 'Planejada', false, ['required' => '']) !!}
                            Planejada
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('localidade', trans('quickadmin.treinamento.fields.localidade').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('localidade'))
                        <p class="help-block">
                            {{ $errors->first('localidade') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('localidade', 'Sala de Treinamento', false, []) !!}
                            Sala de Treinamento
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('localidade', 'Área de Produção', false, []) !!}
                            Área de Produção
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('localidade', 'Ambos', false, []) !!}
                            Ambos
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('disponibilidade', trans('quickadmin.treinamento.fields.disponibilidade').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('disponibilidade'))
                        <p class="help-block">
                            {{ $errors->first('disponibilidade') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('disponibilidade', 'Recurso Interno', false, ['required' => '']) !!}
                            Recurso Interno
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('disponibilidade', 'Recurso Externo', false, ['required' => '']) !!}
                            Recurso Externo
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('instrutor_id', trans('quickadmin.treinamento.fields.instrutor').'', ['class' => 'control-label']) !!}
                    {!! Form::select('instrutor_id', $instrutors, old('instrutor_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('instrutor_id'))
                        <p class="help-block">
                            {{ $errors->first('instrutor_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_participantes', trans('quickadmin.treinamento.fields.nome-participantes').'*', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-nome_participantes">
                        {{ trans('quickadmin.qa_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-nome_participantes">
                        {{ trans('quickadmin.qa_deselect_all') }}
                    </button>
                    {!! Form::select('nome_participantes[]', $nome_participantes, old('nome_participantes'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-nome_participantes' , 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_participantes'))
                        <p class="help-block">
                            {{ $errors->first('nome_participantes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tipo_treinamento_id', trans('quickadmin.treinamento.fields.tipo-treinamento').'', ['class' => 'control-label']) !!}
                    {!! Form::select('tipo_treinamento_id', $tipo_treinamentos, old('tipo_treinamento_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tipo_treinamento_id'))
                        <p class="help-block">
                            {{ $errors->first('tipo_treinamento_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('espec_treinamento_id', trans('quickadmin.treinamento.fields.espec-treinamento').'', ['class' => 'control-label']) !!}
                    {!! Form::select('espec_treinamento_id', $espec_treinamentos, old('espec_treinamento_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('espec_treinamento_id'))
                        <p class="help-block">
                            {{ $errors->first('espec_treinamento_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('horas', trans('quickadmin.treinamento.fields.horas').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('horas', old('horas'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('horas'))
                        <p class="help-block">
                            {{ $errors->first('horas') }}
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
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });
            
        });
    </script>
            
    <script>
        $("#selectbtn-nome_participantes").click(function(){
            $("#selectall-nome_participantes > option").prop("selected","selected");
            $("#selectall-nome_participantes").trigger("change");
        });
        $("#deselectbtn-nome_participantes").click(function(){
            $("#selectall-nome_participantes > option").prop("selected","");
            $("#selectall-nome_participantes").trigger("change");
        });
    </script>
@stop