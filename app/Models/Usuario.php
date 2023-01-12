<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable =['nome', 'edereco', 'senha'];
    protected $hidden = ['senha'];

    public static function criarConta($nome, $endereco, $senha, $repetirSenha){

    }

    public static function logar($nome, $senha){

    }

    public function excluirConta(){

    }

    public function deslogar(){

    }

    public function adicionarContato(){

    }

    public function listarContatos(){

    }

    public function buscar($termo){

    }

}
