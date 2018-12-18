<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EspecTreinamento
 *
 * @package App
 * @property string $nome_espectreinamento
*/
class EspecTreinamento extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome_espectreinamento'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        EspecTreinamento::observe(new \App\Observers\UserActionsObserver);
    }
    
}
