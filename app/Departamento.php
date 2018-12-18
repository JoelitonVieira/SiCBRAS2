<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departamento
 *
 * @package App
 * @property string $nome_departamento
*/
class Departamento extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome_departamento'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Departamento::observe(new \App\Observers\UserActionsObserver);
    }
    
}
