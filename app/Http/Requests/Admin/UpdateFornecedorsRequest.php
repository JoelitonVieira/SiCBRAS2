<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFornecedorsRequest extends FormRequest
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
            
            'nome_fantasia' => 'min:2|max:20|required',
            'matprima_fornecida' => 'min:4|max:20|required',
            'telefone' => 'required',
            'email' => 'required|email',
        ];
    }
}
