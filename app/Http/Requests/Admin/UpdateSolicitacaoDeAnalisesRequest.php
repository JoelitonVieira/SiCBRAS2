<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSolicitacaoDeAnalisesRequest extends FormRequest
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
            
            'turnos' => 'required',
            'nome_resp_amostragem' => 'required|unique:solicitacao_de_analises,nome_resp_amostragem,'.$this->route('solicitacao_de_analise'),
            'mat_primas' => 'required|unique:solicitacao_de_analises,mat_primas,'.$this->route('solicitacao_de_analise'),
            'lote_ano' => 'required|unique:solicitacao_de_analises,lote_ano,'.$this->route('solicitacao_de_analise'),
            'tipos_graf' => 'required|unique:solicitacao_de_analises,tipos_graf,'.$this->route('solicitacao_de_analise'),
            'n_op' => 'max:2147483647|required|numeric',
            'forno' => 'required',
            'tipos_de_misturas' => 'required',
            'numero_operacao' => 'required',
            'fornos_das_misturas' => 'required',
            'amostra_teste' => 'required',
            'material' => 'required',
            'identificacao_da_amostra' => 'required',
        ];
    }
}
