<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Treinamento
 *
 * @package App
 * @property string $nome_treinamento
 * @property time $carga_horaria
 * @property string $nome_setores
 * @property string $data_inicio
 * @property string $data_conclusao
 * @property integer $validadade
 * @property string $reciclagem
 * @property string $situacao_turma
 * @property string $localidade
 * @property string $disponibilidade
 * @property string $instrutor
 * @property string $tipo_treinamento
 * @property string $espec_treinamento
 * @property string $horas
*/
class Treinamento extends Model
{
    use SoftDeletes;

    protected $fillable = ['carga_horaria', 'data_inicio', 'data_conclusao', 'validadade', 'reciclagem', 'situacao_turma', 'localidade', 'disponibilidade', 'horas', 'nome_treinamento_id', 'nome_setores_id', 'instrutor_id', 'tipo_treinamento_id', 'espec_treinamento_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Treinamento::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNomeTreinamentoIdAttribute($input)
    {
        $this->attributes['nome_treinamento_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setCargaHorariaAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['carga_horaria'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['carga_horaria'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getCargaHorariaAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNomeSetoresIdAttribute($input)
    {
        $this->attributes['nome_setores_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDataInicioAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data_inicio'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['data_inicio'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDataInicioAttribute($input)
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
    public function setDataConclusaoAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data_conclusao'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['data_conclusao'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDataConclusaoAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setValidadadeAttribute($input)
    {
        $this->attributes['validadade'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setInstrutorIdAttribute($input)
    {
        $this->attributes['instrutor_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTipoTreinamentoIdAttribute($input)
    {
        $this->attributes['tipo_treinamento_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setEspecTreinamentoIdAttribute($input)
    {
        $this->attributes['espec_treinamento_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setHorasAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['horas'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['horas'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getHorasAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }
    
    public function nome_treinamento()
    {
        return $this->belongsTo(Turma::class, 'nome_treinamento_id')->withTrashed();
    }
    
    public function nome_setores()
    {
        return $this->belongsTo(Setore::class, 'nome_setores_id')->withTrashed();
    }
    
    public function instrutor()
    {
        return $this->belongsTo(Funcionario::class, 'instrutor_id')->withTrashed();
    }
    
    public function nome_participantes()
    {
        return $this->belongsToMany(Funcionario::class, 'funcionario_treinamento')->withTrashed();
    }
    
    public function tipo_treinamento()
    {
        return $this->belongsTo(TipoDeTreinamento::class, 'tipo_treinamento_id')->withTrashed();
    }
    
    public function espec_treinamento()
    {
        return $this->belongsTo(EspecTreinamento::class, 'espec_treinamento_id')->withTrashed();
    }
    
}
