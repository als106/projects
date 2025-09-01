<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Product;

class EstilosController extends Controller
{
    /**
     * Display a listing of genres and products.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $genres = Genre::all();

        return view('genre.index', compact('products', 'genres'));
    }

    public function estiloMusical()
    {
        $genres = Genre::all();
        $products = Product::all();
        return view('genre.estiloMusical', compact('genres', 'products'));
    }

    public function filtro(Request $request)
    {
        $genres = Genre::all();
        $genre = $request->input('genre');
        
        if ($genre) {
            $genre_filtrado = Genre::where('name', $genre)->first();
            $products = $genre_filtrado->products;
        } else {
            $products = Product::all();
        }
    
        return view('genre.filtro', compact('genres', 'products', 'genre'));
    }
    
    

}
