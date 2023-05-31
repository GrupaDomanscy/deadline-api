<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProjectRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['string','min:3','max:255'],
            'description' => ['string'],
            'id' => ['integer','min:1','exists:projects.id'],
            'done' => ['boolean']
        ];
    }
}
