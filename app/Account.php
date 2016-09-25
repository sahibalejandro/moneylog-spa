<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use BelongsToUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Movimientos en esta cuenta.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    /**
     * Devuelve el monto disponible en la cuenta.
     * 
     * @return int
     */
    public function amount()
    {
        return (int) $this->movements()->sum('amount');
    }
}
