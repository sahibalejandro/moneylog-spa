<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use BelongsToUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'amount', 'description', 'date'];

    /**
     * Cuenta donde se realizó este movimiento.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Pago pagado con este movimiento.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
