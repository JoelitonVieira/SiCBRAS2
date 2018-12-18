<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PastaAFrioOuBriquete
 *
 * @package App
 * @property string $materia_prima
 * @property string $data
 * @property string $num_nf
 * @property string $transportadora
 * @property string $fornecedor
 * @property string $quantidade
 * @property string $entrada_acumulada
 * @property string $observacoes
*/
class PastaAFrioOuBriquete extends Model
{
    use SoftDeletes;

    protected $fillable = ['materia_prima', 'data', 'num_nf', 'transportadora', 'quantidade', 'entrada_acumulada', 'observacoes', 'fornecedor_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        PastaAFrioOuBriquete::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDataAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['data'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDataAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setFornecedorIdAttribute($input)
    {
        $this->attributes['fornecedor_id'] = $input ? $input : null;
    }
    
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id')->withTrashed();
    }
    
}
