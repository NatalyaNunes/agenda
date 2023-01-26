<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable =['nome', 'endereco', 'senha'];
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
                'senha' => Hash::make($senha)
            ]);

            $u->save(); /**insert, vai adicionar na tabela save irá salvar os dados*/
            return $u;
        }
            return null;

    }

    public static function logar($nome, $senha){

        $usuario = Usuario::where('nome', $nome)->first();
        if($usuario != null && Hash::check($senha, $usuario->senha)){
            
            session()->put('usuario', $usuario);
            return true;
        }

        return false;
    }

    public function excluirConta(){

        $this->contatos()->detach();
        $this->delete(); /**para deletar da tabela */
    }

    public function deslogar(){

        session()->forget('usuario');

    }

    public function adicionarContato(){

        $c->save();
        $this->contatos()->attache($c->id);
    }

    public function listarContatos(){

        return $this->contatos()->orderBy('nome')->get(); /**sem os parenteses ele retorna apenas a lista */
    }

    public function buscar($termo){

        return $this->contatos()->where('nome', 'like', "%$termo%")->get();
    }

}
