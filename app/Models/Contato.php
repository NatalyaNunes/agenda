<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'ddd', 'telefone'];

    public function usuarios(){
        return $this->belongsToMany(usuario::class);
    }

    public function excluir(){

    }

    public function alterar($novoNome, $novoDDD, $novoTelefone){

    }

}
