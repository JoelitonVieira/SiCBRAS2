@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.arquivos.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.arquivos.fields.nome-arquivo')</th>
                            <td field-key='nome_arquivo'>{{ $arquivo->nome_arquivo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.arquivos.fields.arquivo')</th>
                            <td field-key='arquivo's> @foreach($arquivo->getMedia('arquivo') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.arquivos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


