<?php

namespace App\Http\Requests\Api\Customer;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Customer\Referred; 
use Illuminate\Validation\Rule;

class UpdateReferred extends FormRequest
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
            'reward_status' =>  [
                Rule::in([
                    ...Referred::EXTERNAL_STATUS,
                    ...Referred::INTERNAL_STATUS
                ]),
                'required_with:merge_email',
                
            ],   
            'email' => 'email|unique:referreds',
            'merge_email' => 'exists:referreds,email',
            'phone_number' => 'string|min:2|max:50',
            'first_name' => 'string|min:2|max:50',
            'last_name' => 'string|min:2|max:50'
        ];
    }
}
