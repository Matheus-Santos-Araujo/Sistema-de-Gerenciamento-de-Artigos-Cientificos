<?php

namespace App\Http\Controllers;

use App\administrador;
use Request;
use App\artigo; 

class AdministradorController extends Controller
{
    public function indicarRevisor()
    {
        $artigo = artigo::find(Request::input('id'));
        $artigo->revisor = Request::input('revisor');
        $artigo->save();
        return redirect()->action('artigosController@listagemadm');
    }
}
