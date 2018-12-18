<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTipoDeTreinamentosRequest extends FormRequest
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
            
            'nome_tipo_treinamento' => 'min:1|max:80|required|unique:tipo_de_treinamentos,nome_tipo_treinamento,'.$this->route('tipo_de_treinamento'),
        ];
    }
}
