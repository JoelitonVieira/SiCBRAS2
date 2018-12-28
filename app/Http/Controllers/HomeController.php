<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if( Auth::user()->role_id == 2 ) {
        $cargos = \App\Cargo::latest()->get(); 
        $setores = \App\Setore::latest()->get(); 
        $turmas = \App\Turma::latest()->get(); 
        $treinamentos = \App\Treinamento::latest()->get(); 
        $total_aberta = 0;
        $total_planejada = 0;
        $total_concluida = 0;

          foreach($treinamentos as $treinamento)
            if($treinamento->situacao_turma == "Aberta") $total_aberta++;

          foreach($treinamentos as $treinamento)
            if($treinamento->situacao_turma == "Planejada") $total_planejada++;

          foreach($treinamentos as $treinamento)
            if($treinamento->situacao_turma == "Concluída") $total_concluida++;

        return view('home2', compact( 'cargos', 'setores', 'turmas', 'treinamentos', 'total_aberta', 'total_planejada', 'total_concluida' ));
        }

        return view('home');
    }
}
