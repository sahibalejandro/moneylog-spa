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
		return $this->user->accounts()->sum('amount');
	}
}