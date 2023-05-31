<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer','min:1','exists:projects.id']
        ];
    }
}
