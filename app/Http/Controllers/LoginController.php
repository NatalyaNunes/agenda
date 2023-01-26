<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function cadastrar(Request $request){

        $usuario = Usuario::criarConta($request->nome, 
        $request->endereco, 
        $request->senha, $request->repetirSenha);
        if($usuario != null){
            return redirect('/'); 
        }
            return 'Deu erro!';
    }
}