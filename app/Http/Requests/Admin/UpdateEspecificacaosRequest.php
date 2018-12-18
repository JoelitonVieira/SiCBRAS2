<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEspecificacaosRequest extends FormRequest
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
            
            'codigo' => 'required|unique:especificacaos,codigo,'.$this->route('especificacao'),
            'data' => 'required|date_format:'.config('app.date_format').' H:i:s',
            'requisito_iso' => 'required',
            'nome_cliente_id' => 'required',
            'cd_produto_id' => 'required',
            'composicao_granulometricas.*.maximo' => 'numeric',
            'composicao_granulometricas.*.minimo' => 'numeric',
            'composicao_quimicas.*.max' => 'numeric',
            'composicao_quimicas.*.minimo' => 'numeric',
        ];
    }
}
