<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnaliseQuimicasRequest extends FormRequest
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
            'nu_analise' => 'required',
            'data' => 'required|date_format:'.config('app.date_format'),
            'fk_solicitar_amostra_id' => 'required',
            'resultados_quimicos.*.quantidade' => 'max:2147483647|nullable|numeric',
            'resultados_quimicos.*.sic_flourizado' => 'numeric',
            'resultados_quimicos.*.sic' => 'numeric',
            'resultados_quimicos.*.ppc' => 'numeric',
            'resultados_quimicos.*.c_reagido' => 'numeric',
            'resultados_quimicos.*.si_reagido' => 'numeric',
            'resultados_quimicos.*.si_livre' => 'numeric',
            'resultados_quimicos.*.sio2' => 'numeric',
            'resultados_quimicos.*.si_sio2' => 'numeric',
            'resultados_quimicos.*.fe2o3' => 'numeric',
            'resultados_quimicos.*.al2o3' => 'numeric',
            'resultados_quimicos.*.cao' => 'numeric',
            'resultados_quimicos.*.mgo' => 'numeric',
            'resultados_quimicos.*.c_livgre' => 'numeric',
        ];
    }
}
