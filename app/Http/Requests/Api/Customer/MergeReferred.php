<?php

namespace App\Http\Requests\Api\Customer;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Customer\Referred; 
use Illuminate\Validation\Rule;

class MergeReferred extends FormRequest
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
                'required'
                
            ],   
            'merge_email' => 'email|exists:referreds,email|required',
        ];
    }
}
