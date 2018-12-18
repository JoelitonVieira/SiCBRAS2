@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.especificacao.title')</h3>
    
    {!! Form::model($especificacao, ['method' => 'PUT', 'route' => ['admin.especificacaos.update', $especificacao->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('codigo', trans('quickadmin.especificacao.fields.codigo').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control', 'placeholder' => 'Código do pedido', 'required' => '']) !!}
                    <p class="help-block">Código do pedido</p>
                    @if($errors->has('codigo'))
                        <p class="help-block">
                            {{ $errors->first('codigo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data', trans('quickadmin.especificacao.fields.data').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data', old('data'), ['class' => 'form-control datetime', 'placeholder' => 'Data e hora', 'required' => '']) !!}
                    <p class="help-block">Data e hora</p>
                    @if($errors->has('data'))
                        <p class="help-block">
                            {{ $errors->first('data') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('requisito_iso', trans('quickadmin.especificacao.fields.requisito-iso').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('requisito_iso', old('requisito_iso'), ['class' => 'form-control', 'placeholder' => 'Requisito', 'required' => '']) !!}
                    <p class="help-block">Requisito</p>
                    @if($errors->has('requisito_iso'))
                        <p class="help-block">
                            {{ $errors->first('requisito_iso') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_cliente_id', trans('quickadmin.especificacao.fields.nome-cliente').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('nome_cliente_id', $nome_clientes, old('nome_cliente_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block">Cliente</p>
                    @if($errors->has('nome_cliente_id'))
                        <p class="help-block">
                            {{ $errors->first('nome_cliente_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cd_produto_id', trans('quickadmin.especificacao.fields.cd-produto').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('cd_produto_id', $cd_produtos, old('cd_produto_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block">Código Produto</p>
                    @if($errors->has('cd_produto_id'))
                        <p class="help-block">
                            {{ $errors->first('cd_produto_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Composicao fisica
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.composicao-fisica.fields.granulometria')</th>
                        <th>@lang('quickadmin.composicao-fisica.fields.maximo')</th>
                        <th>@lang('quickadmin.composicao-fisica.fields.minimo')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="composicao-fisica">
                    @forelse(old('composicao_fisicas', []) as $index => $data)
                        @include('admin.especificacaos.composicao_fisicas_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($especificacao->composicao_fisicas as $item)
                            @include('admin.especificacaos.composicao_fisicas_row', [
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
    <div class="panel panel-default">
        <div class="panel-heading">
            Composição Granulométrica
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.composicao-granulometrica.fields.telas')</th>
                        <th>@lang('quickadmin.composicao-granulometrica.fields.maximo')</th>
                        <th>@lang('quickadmin.composicao-granulometrica.fields.minimo')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="composicao-granulometrica">
                    @forelse(old('composicao_granulometricas', []) as $index => $data)
                        @include('admin.especificacaos.composicao_granulometricas_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($especificacao->composicao_granulometricas as $item)
                            @include('admin.especificacaos.composicao_granulometricas_row', [
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
    <div class="panel panel-default">
        <div class="panel-heading">
            Composição Química
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.composicao-quimica.fields.comp')</th>
                        <th>@lang('quickadmin.composicao-quimica.fields.max')</th>
                        <th>@lang('quickadmin.composicao-quimica.fields.minimo')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="composicao-quimica">
                    @forelse(old('composicao_quimicas', []) as $index => $data)
                        @include('admin.especificacaos.composicao_quimicas_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($especificacao->composicao_quimicas as $item)
                            @include('admin.especificacaos.composicao_quimicas_row', [
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

    <script type="text/html" id="composicao-fisica-template">
        @include('admin.especificacaos.composicao_fisicas_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

    <script type="text/html" id="composicao-granulometrica-template">
        @include('admin.especificacaos.composicao_granulometricas_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

    <script type="text/html" id="composicao-quimica-template">
        @include('admin.especificacaos.composicao_quimicas_row',
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