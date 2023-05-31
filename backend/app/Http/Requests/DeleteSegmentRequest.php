<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteSegmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required','integer','min:1','exists:segments.id']
        ];
    }
}
