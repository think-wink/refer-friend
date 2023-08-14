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
            'referees' => [
                'required',
                'array',
            ],
            'referees.*.match_email' => 'email|required',
            'referees.*.match_phone_number' => 'required|string|min:10|max:50',
            'referees.*.match_first_name' => 'required|string|min:2|max:50',
            'referees.*.match_last_name' =>'required|string|min:2|max:50',
            'referees.*.new_status' => [
                'required',
                Rule::in(Referred::EXTERNAL_STATUS)
            ]
        ];
    }
}
