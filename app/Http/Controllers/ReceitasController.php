<?php

namespace App\Http\Controllers;

use App\categoria;
use App\receita;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReceitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('receitas.listar');
    }

    public function create()
    {
        $categorias = categoria::get();

        return view('receitas.adicionar')
            ->with('categorias', $categorias);
    }

    public function show()
    {
        $receitas = receita::leftJoin('categorias', 'categorias.id', '=', 'receitas.categoria_id')->select('receitas.*' ,'categorias.nome as categoria')->where('receitas.user_id', '=', Auth::user()->id)->get();
        return view('receitas.listar')
            ->with('receitas', $receitas);
    }

    public function welcome()
    {
        $receitas = receita::leftJoin('categorias', 'categorias.id', '=', 'receitas.categoria_id')->select('receitas.*' ,'categorias.nome as categoria')->get();

        return view('receitas.listar')
            ->with('receitas', $receitas);
    }

    protected function store(Request $request, receita $receita)
    {
        $receita = new receita();
        
        try {
            $receita->categoria_id  = $request->input('categoria_id');
            $receita->titulo        = $request->input('titulo');
            $receita->descricao     = $request->input('descricao');
            $receita->ingredientes  = $request->input('ingredientes');
            $receita->modo_preparo  = $request->input('modo_preparo');
            $receita->user_id       = Auth::user()->id;
            $receita->save();

            $id = $receita->id;

            Session::flash('message', 'Receita Cadastrada com Sucesso!');
            Session::flash('alert-sucess');

            $receitas = receita::leftJoin('categorias', 'categorias.id', '=', 'receitas.categoria_id')->select('receitas.*' ,'categorias.nome as categoria')->where('receitas.user_id', '=', Auth::user()->id)->get();

            return view('receitas.listar')
                ->with('receitas', $receitas);
        }catch(QueryException $e) {
            flash("Não foi possível cadastrar a Receita!")->error();
            return redirect()->back();
        }
    }

    protected function edit($id)
    {
        $categorias = categoria::get();
        $receita = receita::find($id);

        return view('receitas.editar')
            ->with('receita', $receita)
            ->with('categorias', $categorias);
    }

    protected function view($id)
    {
        $receita = receita::find($id);

        return view('receitas.visualizar')
            ->with('receitas', $receita);
    }

    protected function update(Request $request, $id)
    {
        $receita = receita::find($id);
        try {
            $receita->categoria_id  = $request->input('categoria_id');
            $receita->titulo        = $request->input('titulo');
            $receita->descricao     = $request->input('descricao');
            $receita->ingredientes  = $request->input('ingredientes');
            $receita->modo_preparo  = $request->input('modo_preparo');

            $receita->save();

            Session::flash('message', 'Receita atualizado com Sucesso!');
            Session::flash('alert-sucess');

            return redirect()->back();
        }catch(QueryException $e) {
            Session::flash('message', 'Falha ao atualizar receita!');
            Session::flash('alert-danger');
            return redirect()->back();
        }
    }

    protected function delete($id)
    {
        $receita = receita::find($id);

        try{
            $receita->delete();

            Session::flash('message', 'Receita excluida com Sucesso!');
            Session::flash('alert-sucess');

            return redirect(route('receitas.listar'));
        }catch(QueryException $e) {
            Session::flash('message', 'Falha ao excluir receita!');
            Session::flash('alert-danger');
            return redirect()->back();
        }
    }
}
