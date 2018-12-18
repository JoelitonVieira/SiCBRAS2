<tr data-index="{{ $index }}">
    <td>{!! Form::text('composicao_fisicas['.$index.'][granulometria]', old('composicao_fisicas['.$index.'][granulometria]', isset($field) ? $field->granulometria: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('composicao_fisicas['.$index.'][maximo]', old('composicao_fisicas['.$index.'][maximo]', isset($field) ? $field->maximo: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('composicao_fisicas['.$index.'][minimo]', old('composicao_fisicas['.$index.'][minimo]', isset($field) ? $field->minimo: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>