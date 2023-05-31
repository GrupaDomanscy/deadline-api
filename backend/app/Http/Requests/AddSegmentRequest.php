<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSegmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['required', 'string'],
            'project_id' => ['required', 'integer', 'exists:projects.id']
        ];
    }
}
