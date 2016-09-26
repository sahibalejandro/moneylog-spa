<?php

class PaymentsApiTest extends TestCase
{
    public function test_obtiene_los_pagos_proximos_del_mes_actual()
    {
        // Preparar el entorno
        $user = factory(App\User::class)->create();

        $overdue = factory(App\Payment::class)->create([
            'user_id' => $user->id,
            'due_date' => date('Y-m-d', strtotime('-1 day')),
        ]);

        $current = factory(App\Payment::class)->create([
            'user_id' => $user->id,
            'due_date' => date('Y-m-d'),
        ]);

        $currentPaid = factory(App\Payment::class)->create([
            'user_id' => $user->id,
            'due_date' => date('Y-m-d'),
            'paid' => true,
        ]);

        $future = factory(App\Payment::class)->create([
            'user_id' => $user->id,
            'due_date' => date('Y-m-d', strtotime('+2 month')),
        ]);

        // Realizar acciones
        $this->visit('/api/payments/current');

        // Validar resultados
        $this->dontSeeJson([
            'id' => $overdue->id,
        ])->dontSeeJson([
            'id' => $currentPaid->id,
        ])->dontSeeJson([
            'id' => $future->id,
        ])->seeJson([
            'id' => $current->id,
        ]);
    }
}