<?php

use App\MovementAction;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AccountAmountTest extends TestCase
{
	use DatabaseMigrations;

	public function test_se_actualiza_el_monto_de_una_cuenta_al_hacer_movimientos_sobre_ella()
	{
		// Crear una cuenta nueva con 0 pesos.
		$account = factory(App\Account::class)->create();
		$this->assertEquals(0, $account->amount);

		// Hacer un deposito de 100 dineros en la cuenta.
		$action = new MovementAction($account->user, 100, $account);
		$action->register();

		$account = $account->fresh();

		$this->assertEquals(100, $account->amount);

		// Hacer un retiro de 50 dineros en la cuenta.
		$action = new MovementAction($account->user, -50, $account);
		$action->register();

		$account = $account->fresh();

		$this->assertEquals(50, $account->amount);
	}
}