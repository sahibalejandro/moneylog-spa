<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function response(array $errors)
    {
        $message = head(array_flatten($errors));

        return response()->json(compact('message'), 422);
    }
}
