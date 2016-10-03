<?php

namespace App\Repositories;

use App\User;
use App\Payment;
use Carbon\Carbon;

class Payments
{
    /**
     * Usuario dueño de los pagos.
     * 
     * @var \App\User
     */
    protected $user;

    /**
     * Constructor.
     * 
     * @param \App\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Devuelve una instancia del repositorio.
     *     
     * @param  \App\User $user
     * @return $this
     */
    public static function of(User $user)
    {
        return new static($user);
    }

    /**
     * Devuelve un query builder preparado para obtener pagos del usuario.
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function payments()
    {
        return Payment::where('user_id', $this->user->id);
    }

    /**
     * Devuelve los pagos a pagar este mes a partir de la fecha actual.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function comingThisMonth()
    {
        $today = Carbon::now()->startOfDay();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        return $this->payments()
            ->unpaid()
            ->between($today, $endOfMonth)
            ->orderBy('due_date', 'asc')
            ->get();
    }

    /**
     * Devuelve un listado de pagos que ya pasó su fecha de pago.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function overdue()
    {
        return $this->payments()
            ->unpaid()
            ->overdue()
            ->orderBy('due_date', 'asc')
            ->get();
    }

    /**
     * Devuelve el total de los pagos que deben ser pagados antes del fin del
     * mes actual, esto inlcuye los pagos atrasados.
     * 
     * @return int
     */
    public function totalUntilThisMonth()
    {
        return $this->payments()
            ->unpaid()
            ->untilMonth()
            ->sum('amount');
    }
}
