<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SolicitarAmostra
 *
 * @package App
 * @property string $setor
 * @property string $data
 * @property string $equipamento
 * @property string $amostra
 * @property string $responsavel
 * @property string $referencia
 * @property string $alimentacao
 * @property string $od_producao
 * @property string $bag_pallet
 * @property integer $peso
 * @property string $cd_especificacao
*/
class SolicitarAmostra extends Model
{
    use SoftDeletes;

    protected $fillable = ['setor', 'data', 'equipamento', 'amostra', 'responsavel', 'referencia', 'alimentacao', 'od_producao', 'bag_pallet', 'peso', 'cd_especificacao_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        SolicitarAmostra::observe(new \App\Observers\UserActionsObserver);
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
     * Set attribute to money format
     * @param $input
     */
    public function setPesoAttribute($input)
    {
        $this->attributes['peso'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCdEspecificacaoIdAttribute($input)
    {
        $this->attributes['cd_especificacao_id'] = $input ? $input : null;
    }
    
    public function cd_especificacao()
    {
        return $this->belongsTo(Especificacao::class, 'cd_especificacao_id')->withTrashed();
    }
    
}
