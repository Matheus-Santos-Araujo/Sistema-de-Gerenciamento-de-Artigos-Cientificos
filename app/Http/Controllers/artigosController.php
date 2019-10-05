<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\artigo;
use Request;
use Auth;
use App\User;
use App\evento;
use DateTime;

class artigosController extends Controller
{
    public function welcome(){

        if(Auth::guest()){
            return redirect('/login');
        }
    
        $user = Auth::user();

        return view('welcome')->with('user', $user);
     }
    
     public function revisados(){

        if(Auth::guest()){
            return redirect('/login');
        }

        $artigos = artigo::all();
        return view('listagemrevisados')->with('artigos', $artigos);
     }

     public function listagemadm(){

        if(Auth::guest()){
            return redirect('/login');
        }
// Quero: uma lista de todos o abertos e fechados separado
// retorno = evento, nm aceitos e nm rejeitados
        $eventos = evento::all(); // Deadline date
        $abertos = artigo::where('evento', 'like', '%'.'nenhum'.'%')->get();
        $fechados = artigo::where('evento', 'like', '%'.'nenhum'.'%')->get();
        $artigosa = artigo::where('evento', 'like', '%'.'nenhum'.'%')->get();
        foreach($eventos as $ev){
            $now = new DateTime();
            $d = date("d-m-Y H:i:s", strtotime($ev->deadline));
            $date = new DateTime($d);
            if($date < $now){
                //$ev->push($fechados);
                //$fechados->add($ev);
                $fechados->push($ev);
            } else {
                //$ev->push($abertos);
                //$abertos->add($ev);
                $abertos->push($ev);
            }
        }

        foreach($fechados as $f){
            $f->periodoinicio = count(artigo::where('evento', 'like', '%'.$f->nome.'%')->where('resultado', 'like', '%'.'Aprovado'.'%')->get());
            $f->periodoiniciofim = count(artigo::where('evento', 'like', '%'.$f->nome.'%')->where('resultado', 'like', '%'.'Rejeitado'.'%')->get());
        }
    
        foreach($abertos as $a){
            $artigosa = artigo::where('evento', 'like', '%'.$a->nome.'%')->get();
        }
     

        return view('listagemadm')->with(['artigosa'=>$artigosa, 'fechados'=>$fechados]);
     }


   public function lista(){

    if(Auth::guest()){
        return redirect('/login');
    }

    $artigos = artigo::all();
    return view('listagem')->with('artigos', $artigos);
 }

 public function form(){
    if(Auth::guest()){
        return redirect('/login');
    }

    $eventos = evento::all();

    return view('artigoform')->with('eventos', $eventos);
 }

 public function inserirArtigo(){
    $ev = evento::where('nome', 'like', '%'.Request::input('evento').'%')->get();
    //$evento = evento::find($ev->id);
    $now = new DateTime();
    $d = date("d-m-Y H:i:s", strtotime($ev[0]->deadline));
    $date = new DateTime($d);
    if($date > $now){
    $artigo = new artigo();
    $artigo->artigodoc = base64_encode(file_get_contents(Request::file('artigodoc')));
    $artigo->titulo = Request::input('titulo');
    $artigo->evento = Request::input('evento');
    $artigo->autores = Request::input('autores');
    $artigo->resumo = Request::input('resumo');
    $artigo->estadoRevisao = false;
    $artigo->save();
    return redirect('/artigos')->withInput();
    } else { return redirect('/inserirartigo'); }		
}

public function excluir($id){
    $artigo = artigo::find($id);
    $artigo->delete();
    return redirect()->action('artigosController@lista');
}

public function aceitar(){
    $artigo = artigo::find(Request::input('id'));
    $artigo->estadoRevisao = true;
    $artigo->parecer = Request::input('parecer');
    $artigo->resultado = Request::input('resultado');
    $artigo->save();
    return redirect()->action('artigosController@revisados');
 }

 public function edicaoartigo(){	
    $eventos = evento::all();
    $artigo = artigo::where('titulo', 'like', '%'.Request::input('titulo').'%')->get();
    return view('editarartigo')->with(['artigo'=>$artigo, 'eventos'=>$eventos]);   
}

public function editarartigo(){
    $ev = evento::where('nome', 'like', '%'.Request::input('evento').'%')->get();
    //$evento = evento::find($ev->id);
    $now = new DateTime();
    $d = date("d-m-Y H:i:s", strtotime($ev[0]->deadline));
    $date = new DateTime($d);
    if($date > $now){
    $artigo = artigo::find(Request::input('id'));
    $artigo->artigodoc = base64_encode(file_get_contents(Request::file('artigodoc')));
    $artigo->titulo = Request::input('titulo');
    $artigo->evento = Request::input('evento');
    $artigo->autores = Request::input('autores');
    $artigo->resumo = Request::input('resumo');
    $artigo->estadoRevisao = false;
    $artigo->save();
    return redirect('/artigos')->withInput();
    } else { return redirect('/edicaoartigo'); }		
}

}
