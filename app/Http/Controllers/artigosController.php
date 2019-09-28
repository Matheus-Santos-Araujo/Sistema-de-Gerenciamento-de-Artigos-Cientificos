<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\artigo;
use Request;
use Auth;
use App\User;

class artigosController extends Controller
{
    public function welcome(){

        if(Auth::guest()){
            return redirect('/login');
        }
    
        $user = Auth::user();

        return view('welcome')->with('user', $user);
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
    return view('artigoform');
 }

 public function inserirArtigo(){
    $artigo = new artigo();
    $artigo->artigodoc = base64_encode(file_get_contents(Request::file('artigodoc')));
    $artigo->titulo = Request::input('titulo');
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
}
