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
     * Actualiza el monto de la cuenta con base en todos sus movimientos.
     * 
     * @return $this
     */
    public function updateAmount()
    {
        $this->amount = $this->movements()->sum('amount');
        $this->save();

        return $this;
    }
}
