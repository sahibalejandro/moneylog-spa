<?php

namespace App;

use Carbon\Carbon;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use BelongsToUser;

    /**
     * Filtra pagos que no han sido pagados.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnpaid($query)
    {
        return $query->where('paid', false);
    }

    /**
     * Filtra pagos dentro de un rango inclusivo de fechas.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $start
     * @param  mixed $end
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBetween($query, $start, $end)
    {
        return $query->whereBetween('due_date', [$start, $end]);
    }

    /**
     * Filtra pagos cuya fecha de pago es menor al fin del mes actual.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUntilMonth($query)
    {
        $date = Carbon::now();

        return $query->where('due_date', '<=', $date->endOfMonth());
    }

    /**
     * Filtra pagos cuya fecha de pago ya pasó.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOverdue($query)
    {
        return $query->where('due_date', '<', Carbon::now());
    }
}
