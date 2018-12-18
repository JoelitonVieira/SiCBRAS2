<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResultadosQuimico
 *
 * @package App
 * @property string $data
 * @property string $op_forno
 * @property integer $quantidade
 * @property string $numeracao
 * @property double $sic_flourizado
 * @property double $sic
 * @property double $ppc
 * @property double $c_reagido
 * @property double $si_reagido
 * @property double $si_livre
 * @property double $sio2
 * @property double $si_sio2
 * @property double $fe2o3
 * @property double $al2o3
 * @property double $cao
 * @property double $mgo
 * @property string $observa
 * @property string $status
 * @property string $n_analis
 * @property double $c_livgre
*/
class ResultadosQuimico extends Model
{
    use SoftDeletes;

    protected $fillable = ['data', 'op_forno', 'quantidade', 'numeracao', 'sic_flourizado', 'sic', 'ppc', 'c_reagido', 'si_reagido', 'si_livre', 'sio2', 'si_sio2', 'fe2o3', 'al2o3', 'cao', 'mgo', 'observa', 'status', 'c_livgre', 'n_analis_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        ResultadosQuimico::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDataAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
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
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQuantidadeAttribute($input)
    {
        $this->attributes['quantidade'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSicFlourizadoAttribute($input)
    {
        if ($input != '') {
            $this->attributes['sic_flourizado'] = $input;
        } else {
            $this->attributes['sic_flourizado'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSicAttribute($input)
    {
        if ($input != '') {
            $this->attributes['sic'] = $input;
        } else {
            $this->attributes['sic'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPpcAttribute($input)
    {
        if ($input != '') {
            $this->attributes['ppc'] = $input;
        } else {
            $this->attributes['ppc'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setCReagidoAttribute($input)
    {
        if ($input != '') {
            $this->attributes['c_reagido'] = $input;
        } else {
            $this->attributes['c_reagido'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSiReagidoAttribute($input)
    {
        if ($input != '') {
            $this->attributes['si_reagido'] = $input;
        } else {
            $this->attributes['si_reagido'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSiLivreAttribute($input)
    {
        if ($input != '') {
            $this->attributes['si_livre'] = $input;
        } else {
            $this->attributes['si_livre'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSio2Attribute($input)
    {
        if ($input != '') {
            $this->attributes['sio2'] = $input;
        } else {
            $this->attributes['sio2'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSiSio2Attribute($input)
    {
        if ($input != '') {
            $this->attributes['si_sio2'] = $input;
        } else {
            $this->attributes['si_sio2'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFe2o3Attribute($input)
    {
        if ($input != '') {
            $this->attributes['fe2o3'] = $input;
        } else {
            $this->attributes['fe2o3'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setAl2o3Attribute($input)
    {
        if ($input != '') {
            $this->attributes['al2o3'] = $input;
        } else {
            $this->attributes['al2o3'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setCaoAttribute($input)
    {
        if ($input != '') {
            $this->attributes['cao'] = $input;
        } else {
            $this->attributes['cao'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setMgoAttribute($input)
    {
        if ($input != '') {
            $this->attributes['mgo'] = $input;
        } else {
            $this->attributes['mgo'] = null;
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNAnalisIdAttribute($input)
    {
        $this->attributes['n_analis_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setCLivgreAttribute($input)
    {
        if ($input != '') {
            $this->attributes['c_livgre'] = $input;
        } else {
            $this->attributes['c_livgre'] = null;
        }
    }
    
    public function n_analis()
    {
        return $this->belongsTo(AnaliseQuimica::class, 'n_analis_id')->withTrashed();
    }
    
}
