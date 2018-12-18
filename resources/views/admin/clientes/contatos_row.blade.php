<tr data-index="{{ $index }}">
    <td>{!! Form::text('contatos['.$index.'][telefone_2]', old('contatos['.$index.'][telefone_2]', isset($field) ? $field->telefone_2: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('contatos['.$index.'][email_2]', old('contatos['.$index.'][email_2]', isset($field) ? $field->email_2: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>