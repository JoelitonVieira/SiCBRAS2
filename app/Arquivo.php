<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Arquivo
 *
 * @package App
 * @property string $nome_arquivo
*/
class Arquivo extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['nome_arquivo'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Arquivo::observe(new \App\Observers\UserActionsObserver);
    }
    
}
