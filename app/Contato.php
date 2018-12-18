<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contato
 *
 * @package App
 * @property string $telefone_2
 * @property string $email_2
 * @property string $nome_cliente
*/
class Contato extends Model
{
    use SoftDeletes;

    protected $fillable = ['telefone_2', 'email_2', 'nome_cliente_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Contato::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNomeClienteIdAttribute($input)
    {
        $this->attributes['nome_cliente_id'] = $input ? $input : null;
    }
    
    public function nome_cliente()
    {
        return $this->belongsTo(Cliente::class, 'nome_cliente_id')->withTrashed();
    }
    
}
