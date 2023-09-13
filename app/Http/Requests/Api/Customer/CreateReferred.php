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
            'referrer_first_name' => [
                'required',
                'string',
                'min:2',
                'max:50'
            ],
            'referrer_last_name' => [
                'required',
                'string',
                'min:2',
                'max:50'
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
            'referrer_first_name.required' => 'Your name is required.',
            'referrer_first_name.string' => 'Your name should be string only.',
            'referrer_first_name.min' => 'Your name should be at least 2 characters.',
            'referrer_first_name.max' => 'Your name should be no more than 50 characters.',
            'referrer_last_name.required' => 'Your name is required.',
            'referrer_last_name.string' => 'Your name should be string only.',
            'referrer_last_name.min' => 'Your name should be at least 2 characters.',
            'referrer_last_name.max' => 'Your name should be no more than 50 characters.',
            'referees.*.email.required' => 'Email is required.',
            'referees.*.email.email' => 'Email must be a valid.',
            'referees.*.email.unique' => 'This person has already been referred.',
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
