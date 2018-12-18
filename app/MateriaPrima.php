<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MateriaPrima
 *
 * @package App
 * @property string $cod_matprima
 * @property string $nome_matprima
*/
class MateriaPrima extends Model
{
    use SoftDeletes;

    protected $fillable = ['cod_matprima', 'nome_matprima'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        MateriaPrima::observe(new \App\Observers\UserActionsObserver);
    }
    
}
