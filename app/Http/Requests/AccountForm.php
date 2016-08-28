<?php

namespace App\Http\Requests;

use App\Account;
use App\Http\Requests\Request;

class AccountForm extends Request
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
            'name' => 'required|unique:accounts,name,NULL,id,user_id,'.$this->user()->id,
        ];
    }

    /**
     * Crea una nueva cuenta en base de datos.
     *
     * @return \App\Account
     */
    public function store()
    {
        return $this->user()->accounts()->save(
            new Account($this->all())
        );
    }
}
