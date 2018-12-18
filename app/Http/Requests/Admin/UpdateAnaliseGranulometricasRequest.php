<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnaliseGranulometricasRequest extends FormRequest
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
            
            'data' => 'required|date_format:'.config('app.date_format').' H:i:s',
            'status' => 'required',
            'fk_solicitar_amostrar_id' => 'required',
            'resultados_fisicos.*.resultado_pesado' => 'numeric',
            'resultados_fisicos.*.resultado_encontrado' => 'numeric',
        ];
    }
}
