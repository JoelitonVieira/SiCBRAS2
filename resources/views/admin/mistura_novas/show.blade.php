@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.mistura-nova.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.data')</th>
                            <td field-key='data'>{{ $mistura_nova->data }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.numero-cf')</th>
                            <td field-key='numero_cf'>{{ $mistura_nova->numero_cf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.numero-kf')</th>
                            <td field-key='numero_kf'>{{ $mistura_nova->numero_kf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.kg-coquebase')</th>
                            <td field-key='kg_coquebase'>{{ $mistura_nova->kg_coquebase }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.kg-areiabase')</th>
                            <td field-key='kg_areiabase'>{{ $mistura_nova->kg_areiabase }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.kg-coquereal')</th>
                            <td field-key='kg_coquereal'>{{ $mistura_nova->kg_coquereal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.kg-areiareal')</th>
                            <td field-key='kg_areiareal'>{{ $mistura_nova->kg_areiareal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.mediacoque')</th>
                            <td field-key='mediacoque'>{{ $mistura_nova->mediacoque }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.mediaareia')</th>
                            <td field-key='mediaareia'>{{ $mistura_nova->mediaareia }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.num-batelada')</th>
                            <td field-key='num_batelada'>{{ $mistura_nova->num_batelada }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.turnos')</th>
                            <td field-key='turnos'>{{ $mistura_nova->turnos }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.coque-total')</th>
                            <td field-key='coque_total'>{{ $mistura_nova->coque_total }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.areia-total')</th>
                            <td field-key='areia_total'>{{ $mistura_nova->areia_total }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.total-batelada')</th>
                            <td field-key='total_batelada'>{{ $mistura_nova->total_batelada }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.total-misturadia')</th>
                            <td field-key='total_misturadia'>{{ $mistura_nova->total_misturadia }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mistura-nova.fields.mistura-total')</th>
                            <td field-key='mistura_total'>{{ $mistura_nova->mistura_total }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.mistura_novas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


