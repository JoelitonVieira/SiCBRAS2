@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.composicao-granulometrica.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.composicao-granulometrica.fields.telas')</th>
                            <td field-key='telas'>{{ $composicao_granulometrica->telas }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.composicao-granulometrica.fields.maximo')</th>
                            <td field-key='maximo'>{{ $composicao_granulometrica->maximo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.composicao-granulometrica.fields.minimo')</th>
                            <td field-key='minimo'>{{ $composicao_granulometrica->minimo }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.composicao_granulometricas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


