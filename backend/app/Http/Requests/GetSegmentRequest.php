<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetSegmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required','integer','exists:segments.id']
        ];
    }
}
