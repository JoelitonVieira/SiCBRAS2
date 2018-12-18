<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAreiasRequest extends FormRequest
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
            
            'data' => 'required|date_format:'.config('app.date_format').'|unique:areias,data,'.$this->route('areium'),
            'fornecedor_id' => 'required|unique:areias,fornecedor_id,'.$this->route('areium'),
            'num_nf' => 'required',
            'cte' => 'max:2147483647|required|numeric',
            'peso_nf' => 'required',
            'peso_sicbras' => 'required',
            'diferenca' => 'required',
            'valor_prod' => 'required',
            'valor_frete' => 'required',
            'rs_areia' => 'required',
            'rs_frete' => 'required',
            'saldo_retirar' => 'numeric|required',
        ];
    }
}
