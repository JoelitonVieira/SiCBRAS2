<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFuncionariosRequest extends FormRequest
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
            
            'numero_matricula' => 'min:1|max:2147483647|required|numeric',
            'nome_funcionario' => 'min:7|max:80|required',
            'nome_cargo_id' => 'required',
            'nome_departamento_id' => 'required',
            'nome_setor_id' => 'required',
            'instrutor' => 'required',
            'situacao' => 'required',
        ];
    }
}
