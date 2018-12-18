<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Funcionario
 *
 * @package App
 * @property integer $numero_matricula
 * @property string $nome_funcionario
 * @property string $nome_cargo
 * @property string $nome_departamento
 * @property string $nome_setor
 * @property string $instrutor
 * @property string $situacao
*/
class Funcionario extends Model
{
    use SoftDeletes;

    protected $fillable = ['numero_matricula', 'nome_funcionario', 'instrutor', 'situacao', 'nome_cargo_id', 'nome_departamento_id', 'nome_setor_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Funcionario::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setNumeroMatriculaAttribute($input)
    {
        $this->attributes['numero_matricula'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNomeCargoIdAttribute($input)
    {
        $this->attributes['nome_cargo_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNomeDepartamentoIdAttribute($input)
    {
        $this->attributes['nome_departamento_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNomeSetorIdAttribute($input)
    {
        $this->attributes['nome_setor_id'] = $input ? $input : null;
    }
    
    public function nome_cargo()
    {
        return $this->belongsTo(Cargo::class, 'nome_cargo_id')->withTrashed();
    }
    
    public function nome_departamento()
    {
        return $this->belongsTo(Departamento::class, 'nome_departamento_id')->withTrashed();
    }
    
    public function nome_setor()
    {
        return $this->belongsTo(Setore::class, 'nome_setor_id')->withTrashed();
    }
    
}
