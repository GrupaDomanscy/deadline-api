<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartSessionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'session_id' => ['required','integer','exists:segments.id']
        ];
    }
}
