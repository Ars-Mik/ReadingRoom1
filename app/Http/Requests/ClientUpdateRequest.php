<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'second_name' => ['required', 'string'],
            'third_name' => ['required', 'string'],
            'password' => ['string', 'confirmed', 'nullable'],
            'old_password' => ['string', 'nullable']
        ];
    }
}
