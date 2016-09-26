<?php

use App\Stats\Stats;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatsTest extends TestCase
{
    public function test_devuelve_la_suma_de_todas_las_cuentas_de_un_usuario()
    {
        $account = factory(App\Account::class)->create();

        factory(App\Movement::class, 2)->create([
            'amount' => 3,
            'account_id' => $account->id,
            'user_id' => $account->user_id,
        ]);

        $stats = new Stats($account->user);

        $this->assertEquals(6, $stats->accountsTotal());
    }

    public function test_calcula_el_monto_a_pagar_para_el_mes_en_curso()
    {
        // Preparar el entorno
        $faker = \Faker\Factory::create();
        $user = factory(App\User::class)->create();

        $overdue = factory(App\Payment::class)->create([
            'amount' => 1000,
            'user_id' => $user->id,
            'due_date' => date('Y-m-d', strtotime('-1 month')),
        ]);

        $current = factory(App\Payment::class)->create([
            'amount'  => 1000,
            'user_id' => $user->id,
            'due_date' => date('Y-m-d'),
        ]);

        $currentPaid = factory(App\Payment::class)->create([
            'amount'  => 1000,
            'user_id' => $user->id,
            'due_date' => date('Y-m-d'),
            'paid' => true,
        ]);

        $future = factory(App\Payment::class)->create([
            'amount' => 1000,
            'user_id' => $user->id,
            'due_date' => date('Y-m-d', strtotime('+1 month')),
        ]);

        // Realizar acciones
        $stats = new Stats($user);
    
        // Validar resultados
        $this->assertEquals(2000, $stats->paymentsTotal());
    }
}