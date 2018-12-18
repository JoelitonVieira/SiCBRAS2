<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAreiaSaidasRequest extends FormRequest
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
            'lider' => 'required',
            'forno' => 'required',
            'saida' => 'required',
            'saida_acumulada' => 'required',
            'observacao' => 'required',
        ];
    }
}
