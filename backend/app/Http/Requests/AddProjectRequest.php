<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required', 'string','min:3','max:255'],
            'description' => ['required', 'string'],
        ];
    }
}
