<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable =['nome', 'edereco', 'senha'];
    protected $hidden = ['senha'];

     public function contatos(){
            return $this->belongsToMany(contato::class);
    }

/**
 * @param string nome
 * @param string endereco
 * @param string senha
 * @param string repetirSenha
 * 
 * @return Usuario
 */

    public static function criarConta($nome, $endereco, $senha, $repetirSenha){

        if($senha == $repetirSenha){
            $u = new Usuario([
                'nome' => $nome,
                'endereco' => $endereco,
                'senha' => $senha
            ]);

            $u->save(); /**insert, vai adicionar na tabela */
            return $u;
        }
            return null;

    }

    public static function logar($nome, $senha){

    }

    public function excluirConta(){

        $this->delete(); /**para deletar da tabela */
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
