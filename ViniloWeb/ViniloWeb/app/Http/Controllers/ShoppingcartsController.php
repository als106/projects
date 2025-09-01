<?php

namespace App\Http\Controllers;

use App\Models\Shoppingcart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingcartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoppingcart =  auth()->user()->shoppingcart;
        $productos = $shoppingcart->products;
        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto->price * $shoppingcart->products()->where('product_id', $producto->id)->sum('quantity');
        }  
        return view('shoppingcarts.index', ['s' => $shoppingcart, 'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $shoppingcart = new Shoppingcart();
        $shoppingcart->user()->associate($user);
        $shoppingcart->save();
        return view('shoppingcarts.index', ['shoppingcart' => $shoppingcart]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'products' => 'required',
            ] 
        );
        $productId = $request->input('products');
        $shoppingcart = auth()->user()->shoppingcart;  
        $product = Product::findOrFail($productId);
        $productOnCart = $shoppingcart->products->find($productId);
        if ($productOnCart) {
            // El producto ya está en el carrito, actualiza la cantidad
            $shoppingcart->products()->updateExistingPivot($productId, ['quantity' =>  $shoppingcart->products()->where('product_id', $productId)->sum('quantity') + 1 ]);
        } else {
            // El producto no está en el carrito, agrégalo con la cantidad especificada
            $shoppingcart->products()->attach($productId, ['quantity' => 1]);
        }
        $product->stock()->increment('sold');
        $product->stock()->decrement('stock');
        session()->flash('message', 'Producto añadido correctamente');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shoppingcart = Shoppingcart::findOrFail($id);
        $shoppingcart->products()->detach();
        return back();
    }

    public function clean()
    {
        $shoppingcart = auth()->user()->shoppingcart; 
        $shoppingcart->products()->detach();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_product($productId)
    {
        $user = Auth::user();
        $shoppingcart = auth()->user()->shoppingcart;  
        $product = Product::findOrFail($productId);
        $productOnCart = $shoppingcart->products->find($productId);
        if ($productOnCart) {
            // El producto ya está en el carrito, actualiza la cantidad
            if($shoppingcart->products()->where('product_id', $productId)->sum('quantity') > 1){
                $shoppingcart->products()->updateExistingPivot($productId, ['quantity' =>  $shoppingcart->products()->where('product_id', $productId)->sum('quantity') - 1 ]);
            } else {
                $shoppingcart->products()->detach($productId);
            }
            $product->stock()->decrement('sold');
            $product->stock()->increment('stock');
        }
        return back();
    }
}
