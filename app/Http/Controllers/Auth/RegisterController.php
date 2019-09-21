<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\aluno;
use App\professor;
//use Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // PARA AUTENTICAÇÃO
           return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'instituicao' => $data['instituicao'],
            'tipo' => $data['tipo'],
            'password' => bcrypt($data['password']),
        ]);
        // PARA REGISTRAR USUARIOS        
        if($data['tipo'] == "aluno"){
            $aluno = new aluno();
            $aluno->nome = $data['name'];
            $aluno->email = $data['email'];
            $aluno->instituicao =$data['instituicao'];
            $aluno->senha = bcrypt($data['password']);
            $aluno->matricula =  $data['matricula'];
            $aluno->save();
         } else {
            $prof = new professor();
            $prof->nome = $data['name'];
            $prof->email = $data['email'];
            $prof->instituicao = $data['instituicao'];
            $prof->senha = bcrypt($data['password']);
            $prof->areadepesquisa = $data['areadepesquisa'];
            $prof->titulacao = $data['titulacao'];
            $prof->save();
         }
        return view('auth/login');
    }
}
