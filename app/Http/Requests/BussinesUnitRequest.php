<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BussinesUnitRequest extends FormRequest
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
            "name"=>'required|unique:bussines_units',
            "street"=>"required",
            "number"=>"required",
            "state"=>"required",
            "city"=>"required",
            "neighborhood"=>"required",
            "zipcode"=>"required"

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome obrigatório.',
            'name.unique' => 'Nome já em uso.',
            'street.required' => 'Rua obrigatório.',
            'number.unique' => 'Numero obrigatório.',
            'state.unique' => 'Estado obrigatório.',
            'city.required'=>'Cidade obrigatório.',
            'neighborhood.required'=>'Bairro obrigatório.',
            'zipcode.required'=>'CEP obrigatório.'
        ];
    }
}
