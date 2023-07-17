<?php

namespace App\Http\Requests\Auth\Member;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'max:30'],
            'email' => ['required', 'email', 'unique:members','min:3', 'max:60'],
            'password' => ['required', 'confirmed',
                Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()],
            'approval'=> ['required']
        ];
    }
}
