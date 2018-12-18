@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pasta-a-frio-ou-briquete.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.materia-prima')</th>
                            <td field-key='materia_prima'>{{ $pasta_a_frio_ou_briquete->materia_prima }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.data')</th>
                            <td field-key='data'>{{ $pasta_a_frio_ou_briquete->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.num-nf')</th>
                            <td field-key='num_nf'>{{ $pasta_a_frio_ou_briquete->num_nf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.transportadora')</th>
                            <td field-key='transportadora'>{{ $pasta_a_frio_ou_briquete->transportadora }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.fornecedor')</th>
                            <td field-key='fornecedor'>{{ $pasta_a_frio_ou_briquete->fornecedor->nome_fantasia or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.quantidade')</th>
                            <td field-key='quantidade'>{{ $pasta_a_frio_ou_briquete->quantidade }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.entrada-acumulada')</th>
                            <td field-key='entrada_acumulada'>{{ $pasta_a_frio_ou_briquete->entrada_acumulada }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pasta-a-frio-ou-briquete.fields.observacoes')</th>
                            <td field-key='observacoes'>{{ $pasta_a_frio_ou_briquete->observacoes }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.pasta_a_frio_ou_briquetes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
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
