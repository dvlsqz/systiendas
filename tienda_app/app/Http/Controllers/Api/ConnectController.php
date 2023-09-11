<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ConnectController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function postRegister(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|same:cpassword|min:8',
            'cpassword' => 'required|min:8'
        ];

        $messages = [
            'name.required' => 'Su nombre es requerido.',
            'email.required' => 'Su correo electronio es requerido.',
            'email.email' => 'El correo electronio que ingreso no es válido.',
            'email.unique' => 'El correo electronico que ingreso ya se encuentra registrado.',
            'phone.required' => 'Su numero de celular es requerido.',
            'phone.unique' => 'El numero de celular que ingreso ya se encuentra registrado.',
            'password.required' => 'Ingrese una contraseña.',
            'password.same' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'cpassword.required' => 'Por farvor confirmar su contraseña.',
            'cpassword.min' => 'La confirmacion de la contraseña debe tener al menos 8 caracteres.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):

            $data = [
                'response_type' => 'error',
                'messages' => json_encode($validator->errors()->all())
            ];

            return response()->json($data);

        endif;
    }
}
