<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Cliente;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function index()
    {
        
        $clientes = Cliente::where([
            'ativo'  => 'S',
            'user_id' => Auth::id()
            ])->get();

        
        return view('clientes.index', compact('clientes'));
        
        
        
    }

    public function listaProdutos(Request $request, $id)
    {

        $search = $request->input('search');

        

        $cliente = Cliente::find($id);
           //dd($cliente); 

        if(empty($search)){
            $registros = Produto::where([
                'ativo' => 'S'
    
                ])->get();
        }else{
            
            $registros = Produto::where([
                'ativo' => 'S',
                'categoria' => $search
                ])->get();
        }

        
        

        $categorias = Produto::distinct()->get(['categoria']);
        

        return view('home.index', compact('registros', 'cliente', 'categorias'));
    }

    public function produto($id = null)
    {
        if( !empty($id) ) {
            $registro = Produto::where([
                'id'    => $id,
                'ativo' => 'S'
                ])->first();

            if( !empty($registro) ) {
                return view('home.produto', compact('registro'));
            }
        }
        return redirect()->route('lista.produtos');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $registros = Produto::where('categoria', 'like', '%'.$search.'%')->get();
        return view('home.index', compact('registros')); 
    }
}
