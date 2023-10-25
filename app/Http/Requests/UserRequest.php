<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'avatar'=>'image|mimes:jpeg,bmp,png,jpg,png'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome obrigatório.',
            'email.required' => 'Email obrigatório.',
            'email.unique' => 'Email já esta em uso.',
            'password.required' => 'Password obrigatório.',
        ];
    }
}
