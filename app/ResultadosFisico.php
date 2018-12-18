<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResultadosFisico
 *
 * @package App
 * @property double $resultado_pesado
 * @property double $resultado_encontrado
 * @property string $nr_analise
*/
class ResultadosFisico extends Model
{
    use SoftDeletes;

    protected $fillable = ['resultado_pesado', 'resultado_encontrado', 'nr_analise_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        ResultadosFisico::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setResultadoPesadoAttribute($input)
    {
        if ($input != '') {
            $this->attributes['resultado_pesado'] = $input;
        } else {
            $this->attributes['resultado_pesado'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setResultadoEncontradoAttribute($input)
    {
        if ($input != '') {
            $this->attributes['resultado_encontrado'] = $input;
        } else {
            $this->attributes['resultado_encontrado'] = null;
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNrAnaliseIdAttribute($input)
    {
        $this->attributes['nr_analise_id'] = $input ? $input : null;
    }
    
    public function nr_analise()
    {
        return $this->belongsTo(AnaliseGranulometrica::class, 'nr_analise_id')->withTrashed();
    }
    
}
