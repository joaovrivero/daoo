<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'     => ' required | exists:users',
            'password'  => ' required | string '
        ];
    }

    public function messages() {
        return [
            'email.require'     => 'O email é obrigatório!!',
            'email.exists'      => 'Email não cadastrado, cadastre-se!',
            'password.require'  => 'A senha é obrigatória!!',
        ];
    }
}
