<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class courseCreateRequest extends FormRequest
{
    public function attributes() {
        return [
            'name' => 'nombre',
            'pricing' => 'cuota',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    public function messages() {
        $required = 'El campo :attribute es obligatorio';
        $min = 'El campo :attribute no puede tener menos de :min caracteres';
        $max = 'El campo :attribute no puede tener más de :max caracteres';
        $unique = 'Ya existe una curso con ese :attribute';
        $gte = "Un curso no puede tener un precio negativo";
        
         return [
             'name.required' => $required,
             'name.min' => $min,
             'name.max' => $max,
             'name.unique' => $unique,
             'pricing.required' => $required,
             'pricing.gte' => $gte,
         ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|max:20|unique:courses,name',
            'pricing' => 'required|gte:0',
        ];
    }
}
