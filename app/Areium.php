<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Areium
 *
 * @package App
 * @property string $data
 * @property string $fornecedor
 * @property string $num_nf
 * @property integer $cte
 * @property string $peso_nf
 * @property string $peso_sicbras
 * @property string $diferenca
 * @property string $valor_prod
 * @property string $valor_frete
 * @property string $rs_areia
 * @property string $rs_frete
 * @property double $saldo_retirar
*/
class Areium extends Model
{
    use SoftDeletes;

    protected $fillable = ['data', 'num_nf', 'cte', 'peso_nf', 'peso_sicbras', 'diferenca', 'valor_prod', 'valor_frete', 'rs_areia', 'rs_frete', 'saldo_retirar', 'fornecedor_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Areium::observe(new \App\Observers\UserActionsObserver);
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

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setCteAttribute($input)
    {
        $this->attributes['cte'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSaldoRetirarAttribute($input)
    {
        if ($input != '') {
            $this->attributes['saldo_retirar'] = $input;
        } else {
            $this->attributes['saldo_retirar'] = null;
        }
    }
    
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id')->withTrashed();
    }
    
}
