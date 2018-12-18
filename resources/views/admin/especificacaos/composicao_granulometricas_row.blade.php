<tr data-index="{{ $index }}">
    <td>{!! Form::text('composicao_granulometricas['.$index.'][telas]', old('composicao_granulometricas['.$index.'][telas]', isset($field) ? $field->telas: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('composicao_granulometricas['.$index.'][maximo]', old('composicao_granulometricas['.$index.'][maximo]', isset($field) ? $field->maximo: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('composicao_granulometricas['.$index.'][minimo]', old('composicao_granulometricas['.$index.'][minimo]', isset($field) ? $field->minimo: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>