@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.resultados-fisico.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.resultados-fisico.fields.resultado-pesado')</th>
                            <td field-key='resultado_pesado'>{{ $resultados_fisico->resultado_pesado }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.resultados-fisico.fields.resultado-encontrado')</th>
                            <td field-key='resultado_encontrado'>{{ $resultados_fisico->resultado_encontrado }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.resultados_fisicos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


