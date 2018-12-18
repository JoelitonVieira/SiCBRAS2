<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoquesRequest extends FormRequest
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
            
            'data_recebimento' => 'required|date_format:'.config('app.date_format'),
            'data_expedicao' => 'required|date_format:'.config('app.date_format'),
            'transportadora' => 'required',
            'fornecedor_id' => 'required',
            'nota_fiscal' => 'numeric|required',
            'cte' => 'max:2147483647|required|numeric',
            'peso_nf' => 'required',
            'peso_sicbras' => 'numeric|required',
            'diferenca' => 'numeric|required',
            'rs_acordo' => 'required',
            'cambio' => 'required',
            'dolar_acordo' => 'required',
            'valor_nota' => 'numeric|required',
            'rs_real_imposto' => 'required',
            'icms' => 'required',
            'pis_confins' => 'numeric|required',
            'ipi' => 'required',
            'encargo_30' => 'required',
            'rs_real_semimposto' => 'required',
            'dolar_sem_imposto' => 'required',
            'valor_frete' => 'numeric|required',
            'rs_frete' => 'numeric|required',
            'saldo_retirar' => 'required',
        ];
    }
}
