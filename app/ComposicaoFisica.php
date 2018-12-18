<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ComposicaoFisica
 *
 * @package App
 * @property string $granulometria
 * @property string $maximo
 * @property string $minimo
 * @property string $cd_especificacao
*/
class ComposicaoFisica extends Model
{
    use SoftDeletes;

    protected $fillable = ['granulometria', 'maximo', 'minimo', 'cd_especificacao_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        ComposicaoFisica::observe(new \App\Observers\UserActionsObserver);
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
