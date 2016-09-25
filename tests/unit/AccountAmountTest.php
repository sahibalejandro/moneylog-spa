<?php

use App\MovementAction;

class AccountAmountTest extends TestCase
{
    public function test_calcula_el_monto_total_de_una_cuenta()
    {
        // Preparar el entorno
        $account = factory(App\Account::class)->create();
        $movements = factory(App\Movement::class, 3)->create([
            'amount' => 500,
            'account_id' => $account->id,
            'user_id' => $account->user->id,
        ]);
    
        // Realizar acciones
    
        // Validar resultados
        $this->assertEquals(1500, $account->amount(), 'El monto total de la cuenta no es el esperado.');
    }
}