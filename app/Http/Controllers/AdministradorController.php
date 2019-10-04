<?php

namespace App\Http\Controllers;

use App\administrador;
use Request;
use App\artigo; 
use App\evento; 
use DateTime;

class AdministradorController extends Controller
{
    public function indicarRevisor()
    {
        $ev = evento::where('nome', 'like', '%'.Request::input('evento').'%')->get();
        //$evento = evento::find($ev->id);
        $now = new DateTime();
        $d = date("d-m-Y H:i:s", strtotime($ev[0]->deadline));
        $date = new DateTime($d);
        if($date < $now){
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
}
