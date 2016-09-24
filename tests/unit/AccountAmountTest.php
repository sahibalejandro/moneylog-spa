<?php

use App\MovementAction;

class AccountAmountTest extends TestCase
{
	public function test_se_actualiza_el_monto_de_una_cuenta_al_hacer_depositos_o_retiros()
	{
		// Crear una cuenta nueva con 0 pesos.
		$account = factory(App\Account::class)->create();

		// Hacer un deposito de 100 dineros en la cuenta.
		$action = new MovementAction($account->user, 100, $account);
		$action->register();

		$account = $account->fresh();

		$this->assertEquals(100, $account->amount, 'El monto en la cuenta no es el esperado después de hacer un deposito.');

		// Hacer un retiro de 50 dineros en la cuenta.
		$action = new MovementAction($account->user, -50, $account);
		$action->register();

		$account = $account->fresh();

		$this->assertEquals(50, $account->amount, 'El monto en la cuenta no es el esperado después de hacer un retiro.');
	}

    public function test_se_actualiza_el_monto_de_una_cuenta_al_borrar_movimientos()
    {
        // Preparar el entorno
        $account = factory(App\Account::class)->create();
        $action = new MovementAction($account->user, 100, $account);
        $movement = $action->register();

        // Realizar acciones
        $movement->delete();
    
        // Validar resultados
        $account = $account->fresh();
        $this->assertEquals(0, $account->amount, 'El monto en la cuenta no es el esperado después de borrar un movimiento.');
    }
}