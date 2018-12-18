<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Turma
 *
 * @package App
 * @property string $nome_treinamento
*/
class Turma extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome_treinamento'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Turma::observe(new \App\Observers\UserActionsObserver);
    }
    
}
