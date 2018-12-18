<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePastaAFrioOuBriquetesRequest extends FormRequest
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
            
            'materia_prima' => 'required',
            'data' => 'required|date_format:'.config('app.date_format'),
            'num_nf' => 'required',
            'transportadora' => 'required',
            'fornecedor_id' => 'required',
            'quantidade' => 'required',
            'entrada_acumulada' => 'required',
            'observacoes' => 'required',
        ];
    }
}
