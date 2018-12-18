<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CoqueSaida
 *
 * @package App
 * @property string $data
 * @property string $lider
 * @property string $forno
 * @property string $saida
 * @property string $saida_acumulada
 * @property string $observacao
*/
class CoqueSaida extends Model
{
    use SoftDeletes;

    protected $fillable = ['data', 'lider', 'forno', 'saida', 'saida_acumulada', 'observacao'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        CoqueSaida::observe(new \App\Observers\UserActionsObserver);
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
    
}
