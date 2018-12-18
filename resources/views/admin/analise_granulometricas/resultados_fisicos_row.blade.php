<tr data-index="{{ $index }}">
    <td>{!! Form::text('resultados_fisicos['.$index.'][resultado_pesado]', old('resultados_fisicos['.$index.'][resultado_pesado]', isset($field) ? $field->resultado_pesado: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_fisicos['.$index.'][resultado_encontrado]', old('resultados_fisicos['.$index.'][resultado_encontrado]', isset($field) ? $field->resultado_encontrado: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>