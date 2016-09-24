<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MovementForm extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required',
            'account_id' => 'required',
            'date' => 'required|date',
        ];
    }

    /**
     * Guarda el movimiento en base de datos.
     *
     * @return \App\Movement
     */
    public function store()
    {
        return $this->user()->makesMovement($this->amount, $this->account_id)
            ->date($this->date)
            ->description($this->description)
            ->register();
    }

    /**
     * Actualiza un movimiento.
     *
     * @param  int $id
     * @return \App\Movement
     */
    public function update($id)
    {
        $movement = $this->user()->movements()->find($id);
        $movement->update($this->all());

        return $movement;
    }
}
