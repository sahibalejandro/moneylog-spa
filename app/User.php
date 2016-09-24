<?php

namespace App;

use App\Movement;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Cuentas del usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Movimientos del usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    /**
     * Pagos del usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Determina si este usuario es dueño de una cuenta dada.
     *
     * @param  int|\App\Account $account
     * @return boolean
     */
    public function ownsAccount($account)
    {
        $id = is_object($account) ? $account->id : $account;

        return $this->accounts()->where('id', $id)->exists();
    }

    /**
     * Inicia una acción de movimiento.
     *
     * @param  int  $amount
     * @param  \App\Account|int  $account
     * @return \App\MovementAction
     */
    public function makesMovement($amount, $account)
    {
        return new MovementAction($this, $amount, $account);
    }
}
