<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResultadosQuimicosRequest extends FormRequest
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
            'quantidade' => 'max:2147483647|nullable|numeric',
            'sic_flourizado' => 'numeric',
            'sic' => 'numeric',
            'ppc' => 'numeric',
            'c_reagido' => 'numeric',
            'si_reagido' => 'numeric',
            'si_livre' => 'numeric',
            'sio2' => 'numeric',
            'si_sio2' => 'numeric',
            'fe2o3' => 'numeric',
            'al2o3' => 'numeric',
            'cao' => 'numeric',
            'mgo' => 'numeric',
            'status' => 'required',
            'c_livgre' => 'numeric',
        ];
    }
}
