<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GrafiteSaida
 *
 * @package App
 * @property string $data
 * @property string $nome_lider
 * @property string $forno
 * @property integer $operacao
 * @property string $saida
 * @property string $umidade
 * @property string $quantidade_real
 * @property string $saida_acumulada
 * @property string $observacoes
 * @property string $quantidade_bags
 * @property string $fornecedor
*/
class GrafiteSaida extends Model
{
    use SoftDeletes;

    protected $fillable = ['data', 'nome_lider', 'forno', 'operacao', 'saida', 'umidade', 'quantidade_real', 'saida_acumulada', 'observacoes', 'quantidade_bags', 'fornecedor_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        GrafiteSaida::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDataAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
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
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setOperacaoAttribute($input)
    {
        $this->attributes['operacao'] = $input ? $input : null;
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
