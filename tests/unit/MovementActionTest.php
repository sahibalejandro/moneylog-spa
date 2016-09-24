<?php

use App\Movement;
use App\MovementAction;

class MovementActionTest extends TestCase
{
    public function test_user_makes_a_movement_action()
    {
        // Preparation.
        $amount = 100000;
        $date = date('Y-m-d');
        $description = 'Description';

        $user = factory(App\User::class)->create();

        $account = factory(App\Account::class)->create([
            'user_id' => $user->id
        ]);

        $payment = factory(App\Payment::class)->create([
            'user_id' => $user->id,
            'account_id' => $account->id
        ]);

        // Implementation.
        $action = new MovementAction($user, $amount, $account);

        $action->date($date);
        $action->payment($payment);
        $action->description($description);

        $movement = $action->register();

        // Assertions
        $this->assertInstanceOf(Movement::class, $movement);
        $this->seeInDatabase('movements', [
            'date' => $date,
            'amount' => $amount,
            'user_id' => $user->id,
            'account_id' => $account->id,
            'payment_id' => $payment->id,
            'description' => $description,
        ]);
    }
}
