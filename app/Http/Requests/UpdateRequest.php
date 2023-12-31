<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest
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
               'fullname' => ['required'],
               'email' => ['required', 'unique:members,id',$this->id],
               'password' => ['nullable',Password::min(8)->symbols()->mixedCase()->letters()->numbers()],
               'phone' => ['required'],
               'identity_number' => 'required|numeric|min_digits:11|max_digits:11',
               'birthday' => ['nullable'],
               'gender' => ['nullable'],
               'image' => ['string']
           ];
    }
}
