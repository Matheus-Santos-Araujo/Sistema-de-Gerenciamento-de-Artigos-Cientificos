<?php

namespace App\Http\Controllers;

use App\aluno;
use Request;

class AlunoController extends Controller
{
    public function cadastroaluno(){	
        $user = auth()->user();	
        $aluno = aluno::where('email', 'like', '%'.$user->email.'%')->get();
	    return view('editaraluno')->with('aluno', $aluno);   
    }

    public function editaraluno(){	
        $user = auth()->user();	
	    $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->instituicao =Request::input('instituicao');
        $user->password =  $user->password;
        $user->tipo =  Request::input('tipo');
        $user->save();

        $aluno = aluno::find(Request::input('id'));
        $aluno->nome = Request::input('name');
        $aluno->email = Request::input('email');
        $aluno->senha = $user->password;
        $aluno->instituicao =Request::input('instituicao');
        $aluno->matricula =  Request::input('matricula');
        $aluno->save();
        return redirect('/welcome');
    }
}
