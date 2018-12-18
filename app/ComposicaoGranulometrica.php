<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ComposicaoGranulometrica
 *
 * @package App
 * @property string $telas
 * @property double $maximo
 * @property double $minimo
 * @property string $cd_especificacao
*/
class ComposicaoGranulometrica extends Model
{
    use SoftDeletes;

    protected $fillable = ['telas', 'maximo', 'minimo', 'cd_especificacao_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        ComposicaoGranulometrica::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setMaximoAttribute($input)
    {
        if ($input != '') {
            $this->attributes['maximo'] = $input;
        } else {
            $this->attributes['maximo'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setMinimoAttribute($input)
    {
        if ($input != '') {
            $this->attributes['minimo'] = $input;
        } else {
            $this->attributes['minimo'] = null;
        }
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
