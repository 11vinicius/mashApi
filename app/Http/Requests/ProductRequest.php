<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name"=>"required|unique:products",
            "quantity"=>"required|integer",
            "brand"=>"required",
            "bussines_unit_id"=>"required"

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome obrigatório.',
            'name.unique' => 'Nome já cadastrado.',
            'quantity.required' => 'Quantidade obrigatório.',
            'brand.required' => 'Marca obrigatório.',
            'bussines_unit_id'=> 'id da unidade de negócio obrigatório.'
        ];
    }
}
