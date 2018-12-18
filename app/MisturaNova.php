<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MisturaNova
 *
 * @package App
 * @property string $data
 * @property string $numero_cf
 * @property string $numero_kf
 * @property string $kg_coquebase
 * @property string $kg_areiabase
 * @property string $kg_coquereal
 * @property string $kg_areiareal
 * @property string $mediacoque
 * @property string $mediaareia
 * @property string $num_batelada
 * @property string $turnos
 * @property string $coque_total
 * @property string $areia_total
 * @property string $total_batelada
 * @property string $total_misturadia
 * @property string $mistura_total
*/
class MisturaNova extends Model
{
    use SoftDeletes;

    protected $fillable = ['data', 'numero_cf', 'numero_kf', 'kg_coquebase', 'kg_areiabase', 'kg_coquereal', 'kg_areiareal', 'mediacoque', 'mediaareia', 'num_batelada', 'turnos', 'coque_total', 'areia_total', 'total_batelada', 'total_misturadia', 'mistura_total'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        MisturaNova::observe(new \App\Observers\UserActionsObserver);
    }
    
}
