<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\evento;
use App\artigo;
use Request;
use Auth;
use DateTime;

class EventoController extends Controller
{
    
    public function lista()
    {
        if(Auth::guest()){
            return redirect('/login');
        }
       date_default_timezone_set("America/Fortaleza"); 
       $n = date("Y-m-d H:i:s");
       $now = new DateTime($n); 
       $eventos = evento::orderBy('created_at','desc')->take(5)->get();
       foreach($eventos as $p){
        $data = str_replace("/", "-", $p->deadline); 
        $d = date("Y-m-d H:i:s", strtotime($data));
        $date = new DateTime($d); 
        if($date < $now){
        $p->situacao = "Fechado"; }
        else {$p->situacao = "Aberto"; }
       }
        return view('listagemeventos')->with('eventos',$eventos);
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
        $c = 0;
        $submissoes = artigo::where('evento', 'like', '%'.$evento->nome.'%')->get();
        foreach($submissoes as $n){
            $c = $c + 1;
    }
    if($c < 1){
        $evento->delete();
        }
		return redirect()->action('EventoController@lista');
    }
    
    public function search(){
    $texto = Request::input('nome');
    $eventos = evento::where('nome', 'like', '%'.$texto.'%')->orWhere('sigla','like','%'.$texto.'%')->orWhere('areaconcentracao','like','%'.$texto.'%')->orWhere('situacao','like','%'.$texto.'%')->orWhere('palavraChave','like','%'.$texto.'%')->get();
    //$eventos = evento::where('nome', 'like', '%'.$texto.'%');
    return view('listagemeventos')->with('eventos', $eventos);   
 }

 public function edicaoevento(){	
    $evento = evento::where('nome', 'like', '%'.Request::input('nome').'%')->get();
    return view('editarevento')->with('evento', $evento);   
}

public function editarevento(){
    $evento = evento::find(Request::input('id'));
    $evento->nome = Request::input('nome');
    $evento->sigla = Request::input('sigla');
    $evento->abertura = Request::input('abertura');
    $evento->deadline = Request::input('deadline');
    $evento->areaconcentracao = Request::input('areaconcentracao');
    $evento->periodoinicio = Request::input('abertura');
    $evento->periodoiniciofim = Request::input('deadline');
    $evento->palavraChave = Request::input('palavrachave');
    $evento->save();
    return redirect('/eventos')->withInput();		
}

}