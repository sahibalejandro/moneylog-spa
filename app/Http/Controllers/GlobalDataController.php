<?php

namespace App\Http\Controllers;

use App\Stats\Stats;

class GlobalDataController extends Controller
{
    /**
     * Devuelve una serie de datos globales.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $stats = new Stats(request()->user());

        return response()->json([
            'accounts' => request()->user()->accounts,
            'accounts_total' => $stats->accountsTotal(),
            'payments_total' => $stats->paymentsTotal(),
        ]);
    }
}
