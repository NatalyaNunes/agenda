<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class AgendaController extends Controller
{
    
    public function minha(){

        $contatos = session()->get('usuario')->listarContatos();
        return view('agenda', compact('contatos'));

    }

    public function novoContato(Request $request){

        $nome = $request->nome;
        $ddd = $request->ddd;
        $telefone = $request->telefone;

        $contato = new Contato([
            'nome' => $nome,
            'ddd' => $ddd,
            'telefone' => $telefone
        ]);
        session()->get('usuario')->adicionarContato($contato);
        return redirect('/agenda/minha');
    }
}
