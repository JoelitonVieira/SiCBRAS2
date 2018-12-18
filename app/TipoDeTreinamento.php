<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoDeTreinamento
 *
 * @package App
 * @property string $nome_tipo_treinamento
*/
class TipoDeTreinamento extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome_tipo_treinamento'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        TipoDeTreinamento::observe(new \App\Observers\UserActionsObserver);
    }
    
}
