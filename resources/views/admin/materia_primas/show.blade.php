@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.materia-prima.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.materia-prima.fields.cod-matprima')</th>
                            <td field-key='cod_matprima'>{{ $materia_prima->cod_matprima }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.materia-prima.fields.nome-matprima')</th>
                            <td field-key='nome_matprima'>{{ $materia_prima->nome_matprima }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.materia_primas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


