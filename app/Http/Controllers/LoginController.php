<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuairo;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function cadastrar($request){

        $ususario = usuario::criarConta($request-> nome, 
        $request -> endereco, 
        $request -> senha, $request -> repetirSenha);
        if($usuario != null){
            return redirect('/'); 
        }
            return 'Deu erro!';
    }
}
