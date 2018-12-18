<tr data-index="{{ $index }}">
    <td>{!! Form::text('resultados_quimicos['.$index.'][op_forno]', old('resultados_quimicos['.$index.'][op_forno]', isset($field) ? $field->op_forno: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::number('resultados_quimicos['.$index.'][quantidade]', old('resultados_quimicos['.$index.'][quantidade]', isset($field) ? $field->quantidade: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][numeracao]', old('resultados_quimicos['.$index.'][numeracao]', isset($field) ? $field->numeracao: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][sic_flourizado]', old('resultados_quimicos['.$index.'][sic_flourizado]', isset($field) ? $field->sic_flourizado: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][sic]', old('resultados_quimicos['.$index.'][sic]', isset($field) ? $field->sic: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][ppc]', old('resultados_quimicos['.$index.'][ppc]', isset($field) ? $field->ppc: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][c_reagido]', old('resultados_quimicos['.$index.'][c_reagido]', isset($field) ? $field->c_reagido: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][si_reagido]', old('resultados_quimicos['.$index.'][si_reagido]', isset($field) ? $field->si_reagido: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][si_livre]', old('resultados_quimicos['.$index.'][si_livre]', isset($field) ? $field->si_livre: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][sio2]', old('resultados_quimicos['.$index.'][sio2]', isset($field) ? $field->sio2: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][si_sio2]', old('resultados_quimicos['.$index.'][si_sio2]', isset($field) ? $field->si_sio2: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][fe2o3]', old('resultados_quimicos['.$index.'][fe2o3]', isset($field) ? $field->fe2o3: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][al2o3]', old('resultados_quimicos['.$index.'][al2o3]', isset($field) ? $field->al2o3: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][cao]', old('resultados_quimicos['.$index.'][cao]', isset($field) ? $field->cao: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][mgo]', old('resultados_quimicos['.$index.'][mgo]', isset($field) ? $field->mgo: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][observa]', old('resultados_quimicos['.$index.'][observa]', isset($field) ? $field->observa: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('resultados_quimicos['.$index.'][c_livgre]', old('resultados_quimicos['.$index.'][c_livgre]', isset($field) ? $field->c_livgre: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>