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
        $artigos = artigo::all();
        $meus = artigo::where('autores', 'like', '%'.$user->name.'%')->get();

        return view('welcome')->with(['user'=>$user, 'meus'=>$meus]);
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
        $eventos = evento::all();
        $abertos = evento::where('sigla', 'like', '%'.'nenhum'.'%')->get();
        $fechados = evento::where('sigla', 'like', '%'.'nenhum'.'%')->get();
        $artigosa = artigo::where('autores', 'like', '%'.'nenhum'.'%')->get();
        foreach($eventos as $ev){
            $n = date("Y-m-d H:i:s");
            $now = new DateTime($n);
            $data = str_replace("/", "-", $ev->deadline);
            $d = date("d-m-Y H:i:s", strtotime($data));
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
            $candidato = artigo::where('evento', 'like', '%'.$a->nome.'%')->get();
            foreach($candidato as $c){
                $artigosa->push($c);
            }
        }
     
        return view('listagemadm')->with(['artigosa'=>$artigosa, 'fechados'=>$fechados]);
     }


   public function lista(){

    if(Auth::guest()){
        return redirect('/login');
    }

    $artigos = artigo::all();
    foreach($artigos as $p){
        date_default_timezone_set("America/Fortaleza"); 
        $n = date("Y-m-d H:i:s");
        $now = new DateTime($n); 
        $ev = evento::where('nome', 'like', '%'.$p->evento.'%')->get();
        foreach($ev as $e){
        $data = str_replace("/", "-", $e->deadline);
        }
        $d = date("Y-m-d H:i:s", strtotime($data));
        $date = new DateTime($d); 
        if($date > $now){
            $p->notify = 1;
        }else {
            $p->notify = 0;
        }
    }
    return view('listagem')->with('artigos',$artigos);
 }

 public function form(){
    if(Auth::guest()){
        return redirect('/login');
    }
    $eventos = evento::where('sigla', 'like', '%'.'nenhum'.'%')->get();
    date_default_timezone_set("America/Fortaleza"); 
    $n = date("Y-m-d H:i:s");
    $now = new DateTime($n); 

    $events = evento::all();

    foreach($events as $e){
            $data = str_replace("/", "-", $e->deadline); 
            $d = date("Y-m-d H:i:s", strtotime($data));
            $date = new DateTime($d); 
            if($date > $now){
                $eventos->push($e);
        }
    }

    return view('artigoform')->with('eventos', $eventos);
 }

 public function inserirArtigo(){
    $ev = evento::where('nome', 'like', '%'.Request::input('evento').'%')->get();
    //$evento = evento::find($ev->id);
    $n = date("Y-m-d H:i:s");
    $now = new DateTime($n);
    $data = str_replace("/", "-", $ev[0]->deadline);
    $d = date("Y-m-d H:i:s", strtotime($data));
    $date = new DateTime($d);
    if($date > $now){
    $artigo = new artigo();
    $artigo->artigodoc = base64_encode(file_get_contents(Request::file('artigodoc')));
    $artigo->titulo = Request::input('titulo');
    $artigo->evento = Request::input('evento');
    $artigo->autores = Request::input('autores'). " - " .Request::input('email');
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
    $n = date("Y-m-d H:i:s");
    $now = new DateTime($n);
    $data = str_replace("/", "-", $ev[0]->deadline);
    $d = date("Y-m-d H:i:s", strtotime($data));
    $date = new DateTime($d);
    if($date > $now){
    $artigo = artigo::find(Request::input('id'));
    $artigo->artigodoc = base64_encode(file_get_contents(Request::file('artigodoc')));
    $artigo->titulo = Request::input('titulo');
    $artigo->evento = Request::input('evento');
    $artigo->autores = Request::input('autores');
    $artigo->resumo = Request::input('resumo');
    $artigo->save();
    return redirect('/artigos');
    } else { return redirect('/edicaoartigo'); }		
}

public function deletarnotificacao(){	
    $artigo = artigo::find(Request::input('id'));
    $artigo->notificacao = "deletando";
    $artigo->save();
    return redirect('/welcome');
}

}
