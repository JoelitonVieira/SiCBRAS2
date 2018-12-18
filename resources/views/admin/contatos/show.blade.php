@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contato.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.contato.fields.telefone-2')</th>
                            <td field-key='telefone_2'>{{ $contato->telefone_2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contato.fields.email-2')</th>
                            <td field-key='email_2'>{{ $contato->email_2 }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contatos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


