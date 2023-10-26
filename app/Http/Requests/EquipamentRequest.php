<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentRequest extends FormRequest
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
            'model'=>'required',
            'photo'=>'required|image|mimes:jpeg,bmp,png,jpg,png',
            'year_of_manufacture'=>'required',
            'serial_number'=>'required',
            'bussines_unit_id'=>'required'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'=>'Campo nome obrigatório.',
            'model.required'=>'Campo modelo obrigatório.',
            'year_of_manufacture.required'=>'Campo ano de fabricação obrigatório.',
            'serial_number.required'=>'Campo número de serie.',
            'bussines_unit_id.required'=>'Campo número de serie.',

        ];
    }
}
