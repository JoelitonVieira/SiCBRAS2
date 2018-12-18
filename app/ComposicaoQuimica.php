<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ComposicaoQuimica
 *
 * @package App
 * @property string $comp
 * @property double $max
 * @property double $minimo
 * @property string $cd_especificacao
*/
class ComposicaoQuimica extends Model
{
    use SoftDeletes;

    protected $fillable = ['comp', 'max', 'minimo', 'cd_especificacao_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        ComposicaoQuimica::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setMaxAttribute($input)
    {
        if ($input != '') {
            $this->attributes['max'] = $input;
        } else {
            $this->attributes['max'] = null;
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
