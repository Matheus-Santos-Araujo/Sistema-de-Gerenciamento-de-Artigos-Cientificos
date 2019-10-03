<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Request;
use App\aluno;
use App\professor;
use Illuminate\Support\Facades\Session;
use Auth;

class ProfessorController extends Controller
{
   
    public function cadastroprof(){	
        $user = auth()->user();	
	    $prof = professor::where('email', 'like', '%'.$user->email.'%')->get();
	    return view('editarprof')->with('prof', $prof);   
    }
    
    public function editarprof(){
        $user = auth()->user();	
        $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->instituicao =Request::input('instituicao');
        $user->password =  $user->password;
        $user->tipo =  Request::input('tipo');
        $user->save();

        $professor = professor::find(Request::input('id'));
        $professor->nome = Request::input('name');
        $professor->email = Request::input('email');
        $professor->instituicao =Request::input('instituicao');
        $professor->senha = $user->password;
        $professor->areadepesquisa =  Request::input('areadepesquisa');
        $professor->titulacao =  Request::input('titulacao');
        $professor->save();
        return redirect('/welcome');
    }
}