<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'marca_id'=>['required'],
            'prod_cod'=>['required'],
            'prod_nom'=>['required'],
            'prod_descripcion'=>['required','min:3'],
            'prod_costo'=>['required'],
            'prod_precio'=>['required'],
            'prod_stock'=>['required'],
            'prod_stock_min'=>['required']
        ];
    }
}
