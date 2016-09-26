<?php

namespace App\Stats;

use App\User;
use App\Repositories\Payments;

class Stats
{
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
	 * Devuelve la suma de los montos en todas las cuentas.
	 * 
	 * @return integer
	 */
	public function accountsTotal()
	{
        return $this->user->accounts->reduce(function ($amount, $account) {
            return $amount += $account->amount();
        }, 0);
	}

    /**
     * Devuelve la suma de los pagos que se deben realizar antes de terminar
     * el mes actual, es decir que también inlcuye los pagos vencidos.
     * 
     * @return integer
     */
    public function paymentsTotal()
    {
        return Payments::of($this->user)->totalUntilThisMonth();
    }
}