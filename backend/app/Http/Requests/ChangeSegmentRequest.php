<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeSegmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'segment_id' => ['required','integer','exists:segments.id'],
            'session_id' => ['required','integer','exists:sessions.id']
        ];
    }
}
