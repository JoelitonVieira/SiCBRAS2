<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cargo
 *
 * @package App
 * @property string $nome_cargo
*/
class Cargo extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome_cargo'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Cargo::observe(new \App\Observers\UserActionsObserver);
    }
    
}
