<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam email string required the email to user.
 * @bodyParam password string required the users password.
 * @response {"token": "2060|dEKg7dU3vespqTYTuGa1wpkUPGkKISJsWav2XH9p"}
 */
class Login extends FormRequest
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
            'email' => 'required|exists:referrers,email',
            'password' => 'required|string',
        ];
    }
}
