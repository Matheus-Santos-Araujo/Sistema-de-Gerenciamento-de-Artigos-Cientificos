<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\evento;
use Request;
use Auth;

class EventoController extends Controller
{
    
    public function lista()
    {
        if(Auth::guest()){
            return redirect('/login');
        }
        $eventos = evento::all();
        return view('listagemeventos')->with('eventos', $eventos);
    }
    
    public function form(){
        if(Auth::guest() || auth()->user()->tipo != "administrador"){
            return redirect('/welcome');
        }
        return view('eventoform');
     }

     public function inserirevento(){
        $evento = new evento();
        $evento->nome = Request::input('nome');
        $evento->sigla = Request::input('sigla');
        $evento->abertura = Request::input('abertura');
        $evento->deadline = Request::input('deadline');
        $evento->areaconcentracao = Request::input('areaconcentracao');
        $evento->periodoinicio = Request::input('abertura');
        $evento->periodoiniciofim = Request::input('deadline');
        $evento->palavraChave = Request::input('palavrachave');
        $evento->situacao = "ativo";
        $evento->save();
        return redirect('/eventos')->withInput();		
    }

    public function excluir($id){
		$evento = evento::find($id);
		$evento->delete();
		return redirect()->action('EventoController@lista');
    }
    
    public function search(){
    $texto = Request::input('nome');
    $eventos = evento::where('nome', 'like', '%'.$texto.'%')->orWhere('sigla','like','%'.$texto.'%')->orWhere('areaconcentracao','like','%'.$texto.'%')->get();
    //$eventos = evento::where('nome', 'like', '%'.$texto.'%');
    return view('listagemeventos')->with('eventos', $eventos);   
 }
}