<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class NovedadesController extends Controller
{
    /**
     * Display a listing of 'Novedades'
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->take(10)->simplePaginate(6, ['*'], 'item1');
        $productsMostSold = Product::join('stock', 'products.id', '=', 'stock.product_id')
                    ->orderBy('sold', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->select('products.*')
                    ->simplePaginate(6, ['*'], 'item2');
    
        return view('novedades.index', compact('products', 'productsMostSold'));
    }
}
