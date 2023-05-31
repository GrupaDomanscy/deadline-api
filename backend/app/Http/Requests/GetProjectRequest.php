<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'min:1', 'exists:projects.id']
        ];
    }
}
