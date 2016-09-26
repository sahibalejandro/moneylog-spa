<?php

namespace App\Http\Controllers;

use App\Repositories\Payments;

class PaymentsController extends Controller
{
    /**
     * Devuelve JSON con los próximos pagos del mes actual.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function current()
    {
        return Payments::of(request()->user())->comingThisMonth();
    }
}
