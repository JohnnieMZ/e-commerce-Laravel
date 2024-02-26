<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\CartCollection;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = \Darryldecode\Cart\Facades\CartFacade::getContent();
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request){

        \Darryldecode\Cart\Facades\CartFacade::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img
            )
        ]);
    
        return redirect()->route('site.carrinho')->with('sucesso','Produto adicionado no carrinhon com sucesso!');
    }

    public function removeCarrinho(Request $request){
        \Darryldecode\Cart\Facades\CartFacade::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso','Produto removido do carrinho com sucesso!');
    }

    public function atualizaCarrinho(Request $request){
        \Darryldecode\Cart\Facades\CartFacade::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity),
            ]
        ]);
        return redirect()->route('site.carrinho')->with('sucesso','Produto atualizado com sucesso!');
    }

    public function limparCarrinho(Request $request){
        \Darryldecode\Cart\Facades\CartFacade::clear();
        return redirect()->route('site.carrinho')->with('aviso','Seu carrinho está vazio!');

    }
}
