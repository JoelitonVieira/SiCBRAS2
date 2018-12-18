<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Coque
 *
 * @package App
 * @property string $data_recebimento
 * @property string $data_expedicao
 * @property string $transportadora
 * @property string $fornecedor
 * @property double $nota_fiscal
 * @property integer $cte
 * @property string $peso_nf
 * @property double $peso_sicbras
 * @property double $diferenca
 * @property string $rs_acordo
 * @property string $cambio
 * @property string $dolar_acordo
 * @property double $valor_nota
 * @property string $rs_real_imposto
 * @property string $icms
 * @property double $pis_confins
 * @property string $ipi
 * @property string $encargo_30
 * @property string $rs_real_semimposto
 * @property string $dolar_sem_imposto
 * @property double $valor_frete
 * @property double $rs_frete
 * @property string $saldo_retirar
*/
class Coque extends Model
{
    use SoftDeletes;

    protected $fillable = ['data_recebimento', 'data_expedicao', 'transportadora', 'nota_fiscal', 'cte', 'peso_nf', 'peso_sicbras', 'diferenca', 'rs_acordo', 'cambio', 'dolar_acordo', 'valor_nota', 'rs_real_imposto', 'icms', 'pis_confins', 'ipi', 'encargo_30', 'rs_real_semimposto', 'dolar_sem_imposto', 'valor_frete', 'rs_frete', 'saldo_retirar', 'fornecedor_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Coque::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDataRecebimentoAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data_recebimento'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['data_recebimento'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDataRecebimentoAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDataExpedicaoAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data_expedicao'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['data_expedicao'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDataExpedicaoAttribute($input)
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
     * Set attribute to date format
     * @param $input
     */
    public function setNotaFiscalAttribute($input)
    {
        if ($input != '') {
            $this->attributes['nota_fiscal'] = $input;
        } else {
            $this->attributes['nota_fiscal'] = null;
        }
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
    public function setPesoSicbrasAttribute($input)
    {
        if ($input != '') {
            $this->attributes['peso_sicbras'] = $input;
        } else {
            $this->attributes['peso_sicbras'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDiferencaAttribute($input)
    {
        if ($input != '') {
            $this->attributes['diferenca'] = $input;
        } else {
            $this->attributes['diferenca'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setValorNotaAttribute($input)
    {
        if ($input != '') {
            $this->attributes['valor_nota'] = $input;
        } else {
            $this->attributes['valor_nota'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPisConfinsAttribute($input)
    {
        if ($input != '') {
            $this->attributes['pis_confins'] = $input;
        } else {
            $this->attributes['pis_confins'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setValorFreteAttribute($input)
    {
        if ($input != '') {
            $this->attributes['valor_frete'] = $input;
        } else {
            $this->attributes['valor_frete'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setRsFreteAttribute($input)
    {
        if ($input != '') {
            $this->attributes['rs_frete'] = $input;
        } else {
            $this->attributes['rs_frete'] = null;
        }
    }
    
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id')->withTrashed();
    }
    
}
