<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 *
 * @package App
 * @property string $nome_cliente
 * @property string $cpf
 * @property string $cnpj
 * @property string $email_cliente
 * @property string $telefone
 * @property string $cep
*/
class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome_cliente', 'cpf', 'cnpj', 'email_cliente', 'telefone', 'cep_address', 'cep_latitude', 'cep_longitude'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Cliente::observe(new \App\Observers\UserActionsObserver);
    }
    
    public function contatos() {
        return $this->hasMany(Contato::class, 'nome_cliente_id');
    }
}
