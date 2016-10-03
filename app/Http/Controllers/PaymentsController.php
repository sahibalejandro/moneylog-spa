<?php

namespace App\Http\Controllers;

use App\Repositories\Payments;

class PaymentsController extends Controller
{
    /**
     * Devuelve un JSON con los próximos pagos del mes actual.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function current()
    {
        return Payments::of(request()->user())->comingThisMonth();
    }

    /**
     * Devuelve un JSON con los pagos vencidos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function overdue()
    {
        return Payments::of(request()->user())->overdue();
    }

    /**
     * Devuelve un JSON con los detalles de un pago.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return request()->user()->payments()->findOrFail($id);
    }
}
