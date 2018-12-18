<tr data-index="{{ $index }}">
    <td>{!! Form::text('composicao_quimicas['.$index.'][comp]', old('composicao_quimicas['.$index.'][comp]', isset($field) ? $field->comp: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('composicao_quimicas['.$index.'][max]', old('composicao_quimicas['.$index.'][max]', isset($field) ? $field->max: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('composicao_quimicas['.$index.'][minimo]', old('composicao_quimicas['.$index.'][minimo]', isset($field) ? $field->minimo: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>