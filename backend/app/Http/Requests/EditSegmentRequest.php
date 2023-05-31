<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSegmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['string'],
            'project_id' => ['integer', 'exists:projects.id'],
            'done' => ['boolean'],
            'id' => ['integer','min:1','exists:segments.id'],
        ];
    }
}
