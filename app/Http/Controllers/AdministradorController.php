<?php

namespace App\Http\Controllers;

use App\administrador;
use Request;
use App\artigo; 

class AdministradorController extends Controller
{
    public function indicarRevisor()
    {
        $artigo = artigo::find(Request::input('id'));
        $revisor = Request::input('revisor');
        $nome = Request::input('nome');
        $numerorevisando = artigo::where('revisor', 'like', '%'.$revisor.'%')->where('estadoRevisao', 'like', '%'.'0'.'%')->get();
        if(strpos($artigo->autores,$nome) === false || count($numerorevisando) < 2){
        $artigo->revisor = $revisor;
        $artigo->save();
        }
        return redirect()->action('artigosController@listagemadm');
    }
}
