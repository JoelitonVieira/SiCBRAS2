@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.analise-granulometrica.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.analise-granulometrica.fields.resultados-penr')</th>
                            <td field-key='resultados_penr'>{{ $analise_granulometrica->resultados_penr }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.analise-granulometrica.fields.data')</th>
                            <td field-key='data'>{{ $analise_granulometrica->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.analise-granulometrica.fields.status')</th>
                            <td field-key='status'>{{ $analise_granulometrica->status }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.analise-granulometrica.fields.destino')</th>
                            <td>
                    <strong>{{ $analise_granulometrica->destino_address }}</strong>
                    <div id='destino-map' style='width: 600px;height: 300px;' class='map' data-key='destino' data-latitude='{{$analise_granulometrica->destino_latitude}}' data-longitude='{{$analise_granulometrica->destino_longitude}}'></div>
                </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.analise-granulometrica.fields.fk-solicitar-amostrar')</th>
                            <td field-key='fk_solicitar_amostrar'>{{ $analise_granulometrica->fk_solicitar_amostrar->od_producao or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#resultados_fisico" aria-controls="resultados_fisico" role="tab" data-toggle="tab">Resultados Físico</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="resultados_fisico">
<table class="table table-bordered table-striped {{ count($resultados_fisicos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.resultados-fisico.fields.resultado-pesado')</th>
                        <th>@lang('quickadmin.resultados-fisico.fields.resultado-encontrado')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($resultados_fisicos) > 0)
            @foreach ($resultados_fisicos as $resultados_fisico)
                <tr data-entry-id="{{ $resultados_fisico->id }}">
                    <td field-key='resultado_pesado'>{{ $resultados_fisico->resultado_pesado }}</td>
                                <td field-key='resultado_encontrado'>{{ $resultados_fisico->resultado_encontrado }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('resultados_fisico_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.resultados_fisicos.restore', $resultados_fisico->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('resultados_fisico_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.resultados_fisicos.perma_del', $resultados_fisico->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('resultados_fisico_view')
                                    <a href="{{ route('admin.resultados_fisicos.show',[$resultados_fisico->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('resultados_fisico_edit')
                                    <a href="{{ route('admin.resultados_fisicos.edit',[$resultados_fisico->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('resultados_fisico_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.resultados_fisicos.destroy', $resultados_fisico->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.analise_granulometricas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent
   <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
 
    <script>
        function initialize() {
            const maps = document.getElementsByClassName("map");
            for (let i = 0; i < maps.length; i++) {
                const field = maps[i]
                const fieldKey = field.dataset.key;
                const latitude = parseFloat(field.dataset.latitude) || -33.8688;
                const longitude = parseFloat(field.dataset.longitude) || 151.2195;
        
                const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                    center: {lat: latitude, lng: longitude},
                    zoom: 13
                });
                const marker = new google.maps.Marker({
                    map: map,
                    position: {lat: latitude, lng: longitude},
                });
        
                marker.setVisible(true);
            }    
              
          }
    </script>
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
