<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMisturaNovasRequest extends FormRequest
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
            'data' => 'required',
            'numero_cf' => 'required',
            'numero_kf' => 'required',
            'kg_coquebase' => 'required',
            'kg_areiabase' => 'required',
            'kg_coquereal' => 'required',
            'kg_areiareal' => 'required',
            'mediacoque' => 'required',
            'mediaareia' => 'required',
            'num_batelada' => 'required',
            'coque_total' => 'required',
            'areia_total' => 'required',
            'total_batelada' => 'required',
            'total_misturadia' => 'required',
            'mistura_total' => 'required',
        ];
    }
}
