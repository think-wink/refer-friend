<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

trait EmailValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function emailCreateRules(): array
    {
        return ['required','email', 'unique:users,email'];
    }

    protected function emailRules(): array 
    {
        return [
            'required',
            'email',
            Rule::exists('users', 'email')->whereNull('deleted_at'),
        ];
    }

    
}
