<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGrafiteSaidasRequest extends FormRequest
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
            
            'data' => 'required|date_format:'.config('app.date_format'),
            'nome_lider' => 'required',
            'forno' => 'required',
            'operacao' => 'max:2147483647|required|numeric',
            'saida' => 'required',
            'umidade' => 'required',
            'quantidade_real' => 'required',
            'saida_acumulada' => 'required',
            'observacoes' => 'required',
            'quantidade_bags' => 'required',
            'fornecedor_id' => 'required',
        ];
    }
}
