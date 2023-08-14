<?php

namespace App\Http\Requests\Api\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateReferrer extends FormRequest
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
            'referrers' => [
                'required',
                'array',
            ],
            'referrers.*.email' => [
                'required',
                'distinct:strict',
                'email',
                'unique:referrers,email'
            ]
        ];
    }
}
