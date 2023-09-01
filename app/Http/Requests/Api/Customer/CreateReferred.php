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
            ],
            'permission' => [
                'accepted',
            ],
            'terms' => [
                'accepted',
            ],
        ];
    }

    public function messages()
    {
        return [
            'referees.*.email.required' => 'Email is required.',
            'referees.*.email.email' => 'Email must be a valid.',
            'referees.*.email.unique' => 'This email has already been taken.',
            'referees.*.phone_number.required' => 'Phone number is required.',
            'referees.*.phone_number.digits' => 'Phone number should be at least 10 digits.',
            'referees.*.first_name.required' => 'First name is required.',
            'referees.*.first_name.string' => 'First name should be string only.',
            'referees.*.first_name.min' => 'First name should be at least 2 characters.',
            'referees.*.first_name.max' => 'First name should be no more than 50 characters.',
            'referees.*.last_name.required' => 'Last name is required.',
            'referees.*.last_name.string' => 'Last name should be string only.',
            'referees.*.last_name.min' => 'Last name should be at least 2 characters.',
            'referees.*.last_name.max' => 'Last name should be no more than 50 characters.',
            'permission' => 'This field must be confirmed.',
        ];
    }
}
