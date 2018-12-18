<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setore
 *
 * @package App
 * @property string $nome_setores
*/
class Setore extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome_setores'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Setore::observe(new \App\Observers\UserActionsObserver);
    }
    
}
