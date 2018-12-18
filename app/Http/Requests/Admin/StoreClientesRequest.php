<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientesRequest extends FormRequest
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
            'nome_cliente' => 'required|unique:clientes,nome_cliente,'.$this->route('cliente'),
            'email_cliente' => 'required|email|unique:clientes,email_cliente',
            'telefone' => 'min:11|max:15|required',
            'cep_address'=>'required',
            'cep_latitude'=>'required',
            'cep_longitude'=>'required',
            'contatos.*.telefone_2' => 'required',
            'contatos.*.email_2' => 'required',
        ];
    }
}
