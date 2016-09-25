<?php

namespace App\Stats;

use App\User;

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
		return (int) $this->user->accounts()->sum('amount');
	}

    /**
     * Devuelve la suma de los pagos que se deben realizar en el mes actual.
     * 
     * @return integer
     */
    public function paymentsTotal()
    {
        $month = date('m');
        $year  = date('Y');

        return (int) $this->user->payments()
            ->whereRaw("MONTH(due_date) = $month AND YEAR(due_date) = $year")
            ->sum('amount');
    }
}