<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGrafitesRequest extends FormRequest
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
            'nota_fiscal' => 'required',
            'transportadora' => 'required',
            'fornecedor_id' => 'required',
            'forno' => 'required',
            'operacao' => 'max:2147483647|required|numeric',
            'quantidade' => 'required',
            'umidade' => 'required',
            'quantidade_real' => 'required',
            'entrada_acumulada' => 'required',
            'observacoes' => 'required',
            'quantidade_bags' => 'required',
        ];
    }
}
