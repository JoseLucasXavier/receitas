<?php

namespace App\Http\Controllers;

use App\categoria;
use App\receita;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WelcomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $receitas = receita::leftJoin('categorias', 'categorias.id', '=', 'receitas.categoria_id')->select('receitas.*' ,'categorias.nome as categoria')->get();

        return view('welcome')
            ->with('receitas', $receitas);
    }
}
