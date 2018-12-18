<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AnaliseQuimica
 *
 * @package App
 * @property string $material
 * @property string $nu_analise
 * @property string $data
 * @property string $fk_solicitar_amostra
*/
class AnaliseQuimica extends Model
{
    use SoftDeletes;

    protected $fillable = ['material', 'nu_analise', 'data', 'fk_solicitar_amostra_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        AnaliseQuimica::observe(new \App\Observers\UserActionsObserver);
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
     * Set to null if empty
     * @param $input
     */
    public function setFkSolicitarAmostraIdAttribute($input)
    {
        $this->attributes['fk_solicitar_amostra_id'] = $input ? $input : null;
    }
    
    public function fk_solicitar_amostra()
    {
        return $this->belongsTo(SolicitarAmostra::class, 'fk_solicitar_amostra_id')->withTrashed();
    }
    
    public function resultados_quimicos() {
        return $this->hasMany(ResultadosQuimico::class, 'n_analis_id');
    }
}
