<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTreinamentosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_treinamento_id' => 'required',
            'carga_horaria' => 'required|date_format:H:i:s',
            'nome_setores_id' => 'required',
            'data_inicio' => 'required|date_format:'.config('app.date_format'),
            'data_conclusao' => 'required|date_format:'.config('app.date_format'),
            'validadade' => 'max:2147483647|nullable|numeric',
            'reciclagem' => 'required',
            'situacao_turma' => 'required',
            'disponibilidade' => 'required',
            'nome_participantes' => 'required',
            'nome_participantes.*' => 'exists:funcionarios,id',
            'horas' => 'required|date_format:'.config('app.date_format').' H:i:s',
        ];
    }
}
