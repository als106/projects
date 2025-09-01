<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Order;
use App\Models\Sale;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class GenreController extends Controller
{
    public function index()
    {
        $g = Genre::paginate(3);
        return view('genre.index', ['genres' => $g]);
    }

    public function show($id)
    {
        $g = Genre::findOrFail($id);
        return view('genre.show', ['genre' => $g]);
    }
    
    public function create(){
        $g = Genre::all();
        return view('genre.create');
    }

    public function newGenrePost(Request $request)
    {
        if($request->has('name'))
        {
            $data = $request->validate((new Genre)->rules());
    
            $genre = Genre::create($data);

            $genre->save();
        
            return redirect()->action([GenreController::class, 'index']);
        }
    }

    //pasar el id por aqui
    public function updateGenreGet($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genre.update', ['genre' => $genre]);
    }

    public function updateGenre(Request $request, $id)
    {
        if($request->has('name'))
        {
            $data = $request->validate((new Genre)->rules());
 
            $genre = Genre::findOrFail($id);
            $genre->name = $data['name'];
            $genre->save();
           
            return redirect()->action([GenreController::class, 'index']);    
        }
    }

    public function deleteGenre($id)
    {
        $genre = Genre::findOrFail($id);

        foreach($genre->products as $p){
            if($p->ordered)
            {
                return redirect()->back()->withErrors("Este género no puede ser eliminado, tiene productos que pertenecen a un pedido");
            }
        }

        $genre->delete();

        return redirect('/genres');
    }

    public function sortGenres()
    {
        $name = 'name';
        $genres = Genre::orderBy($name)->paginate(3);

        return view('genre.index', ['genres' => $genres, 'sort' => $name]);
    }

    public function estiloMusical()
    {
        $genres = Genre::paginate(12);
        return view('genre.estiloMusical', ['genres' => $genres]);
    }  

    public function genreProducts($id)
    {
        $genre = Genre::find($id);
        $products = $genre->products;
        

        return view('genre.genreProducts', compact('genre', 'products'));
    }

}
