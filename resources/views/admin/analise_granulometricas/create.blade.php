@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.analise-granulometrica.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.analise_granulometricas.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('resultados_penr', trans('quickadmin.analise-granulometrica.fields.resultados-penr').'', ['class' => 'control-label']) !!}
                    {!! Form::text('resultados_penr', old('resultados_penr'), ['class' => 'form-control', 'placeholder' => 'Numero Analise ']) !!}
                    <p class="help-block">Numero Analise </p>
                    @if($errors->has('resultados_penr'))
                        <p class="help-block">
                            {{ $errors->first('resultados_penr') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.analise-granulometrica.fields.data').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('status', trans('quickadmin.analise-granulometrica.fields.status').'*', ['class' => 'control-label']) !!}
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
                            {!! Form::radio('status', 'Reprovado', false, ['required' => '']) !!}
                            Reprovado
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('destino_address', trans('quickadmin.analise-granulometrica.fields.destino').'', ['class' => 'control-label']) !!}
                    {!! Form::text('destino_address', old('destino_address'), ['class' => 'form-control map-input', 'id' => 'destino-input']) !!}
                    {!! Form::hidden('destino_latitude', 0 , ['id' => 'destino-latitude']) !!}
                    {!! Form::hidden('destino_longitude', 0 , ['id' => 'destino-longitude']) !!}
                    <p class="help-block">Destino</p>
                    @if($errors->has('destino'))
                        <p class="help-block">
                            {{ $errors->first('destino') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div id="destino-map-container" style="width:100%;height:200px; ">
                <div style="width: 100%; height: 100%" id="destino-map"></div>
            </div>
            @if(!env('GOOGLE_MAPS_API_KEY'))
                <b>'GOOGLE_MAPS_API_KEY' is not set in the .env</b>
            @endif
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fk_solicitar_amostrar_id', trans('quickadmin.analise-granulometrica.fields.fk-solicitar-amostrar').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('fk_solicitar_amostrar_id', $fk_solicitar_amostrars, old('fk_solicitar_amostrar_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block">Amostra Ordem de Produção</p>
                    @if($errors->has('fk_solicitar_amostrar_id'))
                        <p class="help-block">
                            {{ $errors->first('fk_solicitar_amostrar_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Resultados Físico
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.resultados-fisico.fields.resultado-pesado')</th>
                        <th>@lang('quickadmin.resultados-fisico.fields.resultado-encontrado')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="resultados-fisico">
                    @foreach(old('resultados_fisicos', []) as $index => $data)
                        @include('admin.analise_granulometricas.resultados_fisicos_row', [
                            'index' => $index
                        ])
                    @endforeach
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
   <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
   <script src="/adminlte/js/mapInput.js"></script>

    <script type="text/html" id="resultados-fisico-template">
        @include('admin.analise_granulometricas.resultados_fisicos_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

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
            
            <script>
        $('.add-new').click(function () {
            var tableBody = $(this).parent().find('tbody');
            var template = $('#' + tableBody.attr('id') + '-template').html();
            var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
            if (isNaN(lastIndex)) {
                lastIndex = 0;
            }
            tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
            return false;
        });
        $(document).on('click', '.remove', function () {
            var row = $(this).parentsUntil('tr').parent();
            row.remove();
            return false;
        });
        </script>
@stop