<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TransferForm extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->accountsBelongsToUser();
    }

    /**
     * Veirica que las cuentas de retiro y destino pertenezcan al usuario
     * firmado.
     *
     * @return boolean
     */
    protected function accountsBelongsToUser()
    {
        return $this->user()->ownsAccount($this->from_account_id)
            && $this->user()->ownsAccount($this->to_account_id);
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
            'from_account_id' => 'required',
            'to_account_id' => 'required',
        ];
    }

    /**
     * Guarda los movimientos de la transferencia en la base de datos.
     *
     * @return array
     */
    public function store()
    {
        // Retiro
        $this->user()
            ->makesMovement(-$this->amount, $this->from_account_id)
            ->description($this->description)
            ->date($this->date)
            ->register();

        // Depósito
        $this->user()
            ->makesMovement($this->amount, $this->to_account_id)
            ->description($this->description)
            ->date($this->date)
            ->register();
    }
}
