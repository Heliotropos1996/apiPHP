<?php

namespace App\Validator;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserValidator
{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function validate()
    {

        return Validator::make($this->request->all(), $this->rules(), $this->messages());
    }



    private function rules()
    {
        return [
            "firstname" => "required|string",
            "lastname" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:6",
            "document_number" => "required|string|unique:users,document_number",
            "document_type" => "required|string",
            "phone" => "required|string",

        ];
    }

    private function messages()
    {
        return [
            "required" => "El :attribute es requerido",
            "string" => "El :attribute debe ser un texto",
            "email" => "El email debe ser válido",
            "unique" => "El :attribute ya existe",
            "min" => "El :attribute debe tener al menos :min caracteres",
        ];
    }
}
