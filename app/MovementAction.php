<?php

namespace App;

use Carbon\Carbon;

class MovementAction
{
    /**
     * Fecha del movimiento.
     *
     * @var mixed
     */
    protected $date;

    /**
     * Usuario del movimiento.
     *
     * @var mixed
     */
    protected $user;

    /**
     * Monto del movimiento.
     *
     * @var int
     */
    protected $amount;

    /**
     * Cuenta del movimiento.
     *
     * @var mixed
     */
    protected $account;

    /**
     * Pago pagado con el movimiento.
     *
     * @var mixed
     */
    protected $payment;

    /**
     * Descripción del movimiento.
     *
     * @var string
     */
    protected $description = 'Sin descripción';

    /**
     * Constructor
     *
     * @param  mixed $user
     * @param  int $amount
     * @param  mixed $account
     */
    public function __construct($user, $amount, $account)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->account = $account;
    }

    /**
     * Establece el pago que será pagado con el movimiento.
     *
     * @param  mixed $payment
     * @return $this
     */
    public function payment($payment)
    {
        $this->payment = $payment;

        return $this;
    }

    /**
     * Establece la fecha del movimiento.
     *
     * @param  mixed $date
     * @return $this
     */
    public function date($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Establece la descripción del movimiento.
     *
     * @param  string $description
     * @return $this
     */
    public function description($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Registra el movimiento en base de datos.
     *
     * @return \App\Movement
     */
    public function register()
    {
        $movement = new Movement;

        $movement->user()->associate($this->user);
        $movement->account()->associate($this->account);

        $movement->amount = $this->amount;
        $movement->description = $this->description;
        $movement->date = $this->date ?: Carbon::now();

        if ($this->payment) {
            $movement->payment()->associate($this->payment);
        }

        $movement->save();

        return $movement;
    }
}
