<?php

namespace App\Http\Requests\Api\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateReferred extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'referees' => [
                'required',
                'array',
            ],
            'referees.*.email' => [
                'required',
                'distinct:strict',
                'email',
                'unique:referreds'
            ],
            'referees.*.phone_number' => [
                'required',
                'digits:10'
            ],
            'referees.*.first_name' => [
                'required',
                'string',
                'min:2',
                'max:50'
            ],
            'referees.*.last_name' => [
                'required',
                'string',
                'min:2',
                'max:50'
            ]
        ];
    }
}
