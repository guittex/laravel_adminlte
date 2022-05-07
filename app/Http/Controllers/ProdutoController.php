<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Método que visualiza a listagem dos produtos
     *
     * @return void
     */
    public function index()
    {
        $produtos = Produto::all();
       
        return view('produtos/index',[
            'produtos' => $produtos
        ]);
    }

    /**
     * Método que visualiza o produto
     *
     * @param Produto|int $id
     * @return void
     */
    public function view($id)
    {
        return view('produtos/view',[
            'id' => $id
        ]);
    }

    /**
     * Método que adicionar produtos
     *
     * @param Request $request
     * @return void
     */
    public function add(Request $request)
    {

        if($request->method() == 'POST'){
            $produto = new Produto;
            
            $produto->name        = $request->name;
            $produto->qtd         = $request->qtd;
            $produto->category    = $request->category;
            $produto->description = $request->description;

            $produto->save();

            return redirect('/produtos')->with('msg', 'Produto adicionado com sucesso');
        }

        return view('produtos/add', [

        ]);
    }

    /**
     * Método que edita o produto
     *
     * @param Produto|int $id
     * @param Request $request
     * @return void
     */
    public function edit(int $id, Request $request)
    {
        $produto = Produto::findOrFail($id);

        if($request->method() == "POST") {
            $produto->name        = $request->name;
            $produto->qtd         = $request->qtd;
            $produto->category    = $request->category;
            $produto->description = $request->description;

            $produto->save();

            return redirect('/produtos')->with('msg', 'Produto editado com sucesso');
        }


        return view('produtos/edit', [
            'produto' => $produto,
        ]);
    }
}
