<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormGuardarVenta extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mov_tigo' => 'required|unique:tabla_ventas,movil_tigo',
            'mov_portado' => 'nullable|unique:tabla_ventas,movil_portado'
        ];
    }

    public function messages()
    {
        return [
            'mov_tigo.unique' => 'El número móvil TIGO ya fue ingresado anteriormente',
            'mov_portado.unique' => 'El número móvil Portado ya fue ingresado anteriormente'
        ];
    }
}
