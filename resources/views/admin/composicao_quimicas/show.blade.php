@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.composicao-quimica.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.composicao-quimica.fields.comp')</th>
                            <td field-key='comp'>{{ $composicao_quimica->comp }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.composicao-quimica.fields.max')</th>
                            <td field-key='max'>{{ $composicao_quimica->max }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.composicao-quimica.fields.minimo')</th>
                            <td field-key='minimo'>{{ $composicao_quimica->minimo }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.composicao_quimicas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


