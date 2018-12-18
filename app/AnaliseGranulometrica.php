<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AnaliseGranulometrica
 *
 * @package App
 * @property string $resultados_penr
 * @property string $data
 * @property string $status
 * @property string $destino
 * @property string $fk_solicitar_amostrar
*/
class AnaliseGranulometrica extends Model
{
    use SoftDeletes;

    protected $fillable = ['resultados_penr', 'data', 'status', 'destino_address', 'destino_latitude', 'destino_longitude', 'fk_solicitar_amostrar_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        AnaliseGranulometrica::observe(new \App\Observers\UserActionsObserver);
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
    public function setFkSolicitarAmostrarIdAttribute($input)
    {
        $this->attributes['fk_solicitar_amostrar_id'] = $input ? $input : null;
    }
    
    public function fk_solicitar_amostrar()
    {
        return $this->belongsTo(SolicitarAmostra::class, 'fk_solicitar_amostrar_id')->withTrashed();
    }
    
    public function resultados_fisicos() {
        return $this->hasMany(ResultadosFisico::class, 'nr_analise_id');
    }
}
