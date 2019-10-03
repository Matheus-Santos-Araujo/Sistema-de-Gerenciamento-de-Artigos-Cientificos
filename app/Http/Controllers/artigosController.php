<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\artigo;
use Request;
use Auth;
use App\User;
use App\evento;

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

        $artigos = artigo::all();
        return view('listagemadm')->with('artigos', $artigos);
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
    $artigo = new artigo();
    $artigo->artigodoc = base64_encode(file_get_contents(Request::file('artigodoc')));
    $artigo->titulo = Request::input('titulo');
    $artigo->evento = Request::input('evento');
    $artigo->autores = Request::input('autores');
    $artigo->resumo = Request::input('resumo');
    $artigo->estadoRevisao = false;
    $artigo->save();
    return redirect('/artigos')->withInput();		
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
}
