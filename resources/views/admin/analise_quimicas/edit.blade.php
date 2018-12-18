@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.analise-quimica.title')</h3>
    
    {!! Form::model($analise_quimica, ['method' => 'PUT', 'route' => ['admin.analise_quimicas.update', $analise_quimica->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('material', trans('quickadmin.analise-quimica.fields.material').'', ['class' => 'control-label']) !!}
                    {!! Form::text('material', old('material'), ['class' => 'form-control', 'placeholder' => 'Material']) !!}
                    <p class="help-block">Material</p>
                    @if($errors->has('material'))
                        <p class="help-block">
                            {{ $errors->first('material') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nu_analise', trans('quickadmin.analise-quimica.fields.nu-analise').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nu_analise', old('nu_analise'), ['class' => 'form-control', 'placeholder' => 'N° Analise', 'required' => '']) !!}
                    <p class="help-block">N° Analise</p>
                    @if($errors->has('nu_analise'))
                        <p class="help-block">
                            {{ $errors->first('nu_analise') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.analise-quimica.fields.data').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data', old('data'), ['class' => 'form-control date', 'placeholder' => 'Data', 'required' => '']) !!}
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
                    {!! Form::label('fk_solicitar_amostra_id', trans('quickadmin.analise-quimica.fields.fk-solicitar-amostra').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('fk_solicitar_amostra_id', $fk_solicitar_amostras, old('fk_solicitar_amostra_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block">Amostra Ordem de Produção</p>
                    @if($errors->has('fk_solicitar_amostra_id'))
                        <p class="help-block">
                            {{ $errors->first('fk_solicitar_amostra_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Resultados Químicos
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.resultados-quimicos.fields.op-forno')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.quantidade')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.numeracao')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.sic-flourizado')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.sic')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.ppc')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.c-reagido')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.si-reagido')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.si-livre')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.sio2')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.si-sio2')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.fe2o3')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.al2o3')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.cao')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.mgo')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.observa')</th>
                        <th>@lang('quickadmin.resultados-quimicos.fields.c-livgre')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="resultados-quimicos">
                    @forelse(old('resultados_quimicos', []) as $index => $data)
                        @include('admin.analise_quimicas.resultados_quimicos_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($analise_quimica->resultados_quimicos as $item)
                            @include('admin.analise_quimicas.resultados_quimicos_row', [
                                'index' => 'id-' . $item->id,
                                'field' => $item
                            ])
                        @endforeach
                    @endforelse
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script type="text/html" id="resultados-quimicos-template">
        @include('admin.analise_quimicas.resultados_quimicos_row',
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
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
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