@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.composicao-fisica.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.composicao-fisica.fields.granulometria')</th>
                            <td field-key='granulometria'>{{ $composicao_fisica->granulometria }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.composicao-fisica.fields.maximo')</th>
                            <td field-key='maximo'>{{ $composicao_fisica->maximo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.composicao-fisica.fields.minimo')</th>
                            <td field-key='minimo'>{{ $composicao_fisica->minimo }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.composicao_fisicas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


