<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fornecedor
 *
 * @package App
 * @property string $nome_fantasia
 * @property string $matprima_fornecida
 * @property string $telefone
 * @property string $email
*/
class Fornecedor extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome_fantasia', 'matprima_fornecida', 'telefone', 'email'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Fornecedor::observe(new \App\Observers\UserActionsObserver);
    }
    
}
