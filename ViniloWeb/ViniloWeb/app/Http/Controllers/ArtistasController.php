<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Product;

class ArtistasController extends Controller
{ 
    /**
     * Display a listing of 'Artistas'
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        $genres = Genre::all();
    
        return view('artistas.index', ['authors' => $authors], ['genres' => $genres]);
    }

    public function select(Request $request)
    {
        $genre = $request->input('genre');

        return $this->filtro($request, $genre);
    }

    public function filtro(Request $request, $genre)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $genre_filtrado = Genre::where('name', '=', $genre)->first();           // generos solo con ese nombre
        $authors_filtred = Author::where('genre_id', '=', $genre_filtrado->id)->get();  //autores solo de ese genero
    
        return view('artistas.filtrado', compact('genres', 'authors_filtred', 'authors', 'genre'));
    }
    public function show($id)
    {
        $author = Author::findOrFail($id);
        $genre= Genre::findOrFail($author->genre_id);
        $products = Product::where('author_id', '=', $author->id)->get();
        return view('artistas.detailed', compact('genre', 'author', 'products'));
    }
}
