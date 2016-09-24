<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferForm;

class TransfersController extends Controller
{
    /**
     * Crea una nueva transferencia.
     *
     * @param  \App\Http\Requests\TransferForm $request
     * @return void
     */
    public function store(TransferForm $request)
    {
        $request->store();
    }
}
