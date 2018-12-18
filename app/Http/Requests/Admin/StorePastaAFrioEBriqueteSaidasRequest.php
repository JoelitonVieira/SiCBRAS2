<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePastaAFrioEBriqueteSaidasRequest extends FormRequest
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
            'materia_prima' => 'required',
            'data' => 'required|date_format:'.config('app.date_format'),
            'lider_saida' => 'required',
            'forno_saida' => 'required',
            'operacao' => 'required',
            'saida' => 'required',
            'saida_acumulada' => 'required',
            'observacoes' => 'required',
        ];
    }
}
