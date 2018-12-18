<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SolicitacaoDeAnalise
 *
 * @package App
 * @property string $turnos
 * @property string $nome_resp_amostragem
 * @property string $mat_primas
 * @property string $lote_ano
 * @property string $tipos_graf
 * @property integer $n_op
 * @property string $forno
 * @property string $fornecedor
 * @property string $origem
 * @property string $tipos_de_misturas
 * @property string $numero_operacao
 * @property string $fornos_das_misturas
 * @property string $amostra_teste
 * @property string $material
 * @property string $identificacao_da_amostra
*/
class SolicitacaoDeAnalise extends Model
{
    use SoftDeletes;

    protected $fillable = ['turnos', 'nome_resp_amostragem', 'mat_primas', 'lote_ano', 'tipos_graf', 'n_op', 'forno', 'origem', 'tipos_de_misturas', 'numero_operacao', 'fornos_das_misturas', 'amostra_teste', 'material', 'identificacao_da_amostra', 'fornecedor_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        SolicitacaoDeAnalise::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setNOpAttribute($input)
    {
        $this->attributes['n_op'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setFornecedorIdAttribute($input)
    {
        $this->attributes['fornecedor_id'] = $input ? $input : null;
    }
    
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id')->withTrashed();
    }
    
}
