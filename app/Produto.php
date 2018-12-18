<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produto
 *
 * @package App
 * @property string $codigo
 * @property string $produto
 * @property string $granulometria
*/
class Produto extends Model
{
    use SoftDeletes;

    protected $fillable = ['codigo', 'produto', 'granulometria'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Produto::observe(new \App\Observers\UserActionsObserver);
    }
    
}
