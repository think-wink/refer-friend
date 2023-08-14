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
            'referrers' => [
                'required',
                'array',
            ],
            'referrers.*.match_email' => 'email|required',
            'referrers.*.match_phone_number' => 'string|required',
            'referrers.*.match_first_name' => 'required|string|min:2|max:50',
            'referrers.*.match_last_name' =>'required|string|min:2|max:50',
            'referrers.*.new_status' => Rule::in(Referred::EXTERNAL_STATUS)
        ];
    }
}
