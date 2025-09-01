<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Order;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $a = Author::paginate(4);
        return view('author.index', ['authors' => $a]);
    }
    public function show($id){
        $author = Author::findOrFail($id);
        return view('author.show', ['author' => $author]);
    }
    public function create(){
        $authors = Author::all();
        return view('author.create' , compact('authors'));
    }
    public function store(Request $request){
        $data = $request->validate((new Author)->rules());
        $author = Author::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        $author->save();

        session()->flash('message', 'Autor creado correctamente');
        return redirect()->action([AuthorController::class, 'index']);


    }
    public function edit($id){
        $author = Author::find($id);
        $authors = Author::all();
        return view('author.edit', ['author' => $author], compact('authors'));
    }
    public function update(Request $request, $id){
        $data = $request->validate((new Author)->rules());
        $author = Author::find($id);
        $author->name = $data['name'];
        $author->description = $data['description'];
        $author->save();

        session()->flash('message', 'Autor actualizado correctamente');
        return redirect()->action([AuthorController::class, 'index']);  
    }
    public function destroy($id){

        $orders = Order::all();
        $author = Author::findOrFail($id);

        foreach($author->products as $p){
            if($p->ordered)
            {
                return redirect()->back()->withErrors("Este autor no puede ser eliminado, tiene productos que pertenecen a un pedido");
            }
        }

        // Eliminar todos los productos asociados al autor
        //$author->products()->delete();
        // Eliminar el autor
        $author->delete();
        session()->flash('message', 'Autor eliminado correctamente');
        return redirect()->action([AuthorController::class, 'index']);
    }
    
    public function sortAuthors(){
        $authors = Author::orderBy('name')->paginate(4);
        return view('author.index', ['authors' => $authors]);
    }
}
