<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Especificacao
 *
 * @package App
 * @property string $codigo
 * @property string $data
 * @property string $requisito_iso
 * @property string $nome_cliente
 * @property string $cd_produto
*/
class Especificacao extends Model
{
    use SoftDeletes;

    protected $fillable = ['codigo', 'data', 'requisito_iso', 'nome_cliente_id', 'cd_produto_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Especificacao::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDataAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['data'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDataAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNomeClienteIdAttribute($input)
    {
        $this->attributes['nome_cliente_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCdProdutoIdAttribute($input)
    {
        $this->attributes['cd_produto_id'] = $input ? $input : null;
    }
    
    public function nome_cliente()
    {
        return $this->belongsTo(Cliente::class, 'nome_cliente_id')->withTrashed();
    }
    
    public function cd_produto()
    {
        return $this->belongsTo(Produto::class, 'cd_produto_id')->withTrashed();
    }
    
    public function composicao_fisicas() {
        return $this->hasMany(ComposicaoFisica::class, 'cd_especificacao_id');
    }
    public function composicao_granulometricas() {
        return $this->hasMany(ComposicaoGranulometrica::class, 'cd_especificacao_id');
    }
    public function composicao_quimicas() {
        return $this->hasMany(ComposicaoQuimica::class, 'cd_especificacao_id');
    }
}
