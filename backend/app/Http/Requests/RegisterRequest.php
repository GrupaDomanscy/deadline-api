<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "username" => ['required', 'string', 'min:3', 'max:64', 'unique:users,Login'],
            "password" => ['required', 'string', 'min:8', 'max:64'],
            "repeatPassword" => ['required', 'string', 'min:3', 'max:64', 'same:password']
        ];
    }
}
