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
        return view('eventoform');
     }

     public function inserirevento(){
        $evento = new evento();
        $evento->nome = Request::input('nome');
        $evento->sigla = Request::input('sigla');
        $evento->abertura = Request::input('abertura');
        $evento->deadline = Request::input('deadline');
        $evento->areaconcentracao = Request::input('areaconcentracao');
        $evento->save();
        return redirect('/eventos')->withInput();		
    }

    public function periodo()
    {
        //
    }

   
    public function show(evento $evento)
    {
        //
    }

    
    public function edit(evento $evento)
    {
        //
    }

    
    public function update(Request $request, evento $evento)
    {
        //
    }

    
    public function destroy(evento $evento)
    {
        //
    }
}
