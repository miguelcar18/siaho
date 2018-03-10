<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajadorRequest extends FormRequest
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
    public function rules(){
        switch($this->method())
        {
            case 'GET':
            case 'DELETE': { return []; }
            case 'POST': {
                return [
                    'nombre'        => 'required', 
                    'apellido'      => 'required',
                    'cedula'        => 'required|unique:trabajadores',
                    'cargo'         => 'required',
                    'departamento'  => 'required'
                ];
            }
            case 'PUT': {
                return [
                    'nombre'        => 'required', 
                    'apellido'      => 'required',
                    'cedula'        => 'required|unique:trabajadores',
                    'cargo'         => 'required',
                    'departamento'  => 'required'
                ];
            }
            case 'PATCH': { return []; }
            default:break;
        }
    }

    public function messages(){
        return [
            'nombre.required'       => 'El campo :attribute es obligatorio.',
            'apellido.required'     => 'El campo :attribute es obligatorio.', 
            'cedula.required'       => 'El campo :attribute es obligatorio.', 
            'cargo.required'        => 'El campo :attribute es obligatorio.',
            'departamento.required' => 'El campo :attribute es obligatorio.', 
            'cedula.unique'         => 'La :attribute ingresada ya ha sido registrada.', 
        ];
    }

    public function attributes(){
        return [
            'nombre'        => 'nombre',
            'apellido'      => 'apellido', 
            'cedula'        => 'cedula', 
            'cargo'         => 'cargo',
            'departamento'  => 'departamento'
        ];
    }

    public function response(array $errors){
        if ($this->expectsJson()){
            return response()->json([
                'validations'   => false, 
                'errors'        => $errors
            ]);
        }

        return $this->redirector->to($this->getRedirectUrl())
        ->withInput($this->except($this->dontFlash))
        ->withErrors($errors, $this->errorBag);
    }
}
