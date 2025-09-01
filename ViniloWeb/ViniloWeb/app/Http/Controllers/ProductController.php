<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Author;
use App\Models\Genre;
use App\Models\User;
use App\Models\Review;
use App\Models\Sale;
use App\Models\Order;


class ProductController extends Controller
{
    public function index()
    {
        $p = Product::paginate(3);
        return view('product.index', ['products' => $p]);
    }

    public function show($id)
    {
        $p = Product::findOrFail($id);
        return view('product.show', ['product' => $p]);
    }

    public function newProductGet()
    {
        $authors = Author::orderBy('name')->get();
        $genres = Genre::orderBy('name')->get();
        return view('product.create', ['authors' => $authors], ['genres' => $genres]);
    }

    public function reviewDisplay($id)
    {
        $sales = Sale::All();
        $product = Product::findOrFail($id);
        $reviews = Review::where('product_id', '=', $id)->get();
        $userIds = $reviews->pluck('user_id')->toArray(); // Obtenemos los user_id únicos de las reviews
        $score_average = Review::where('product_id', '=', $id)->avg('score');

        $users = User::whereIn('id', $userIds)->get(); // Consulta para obtener los usuarios correspondientes

        $oferta = 0;

    

        foreach ($sales as $sale)  
        {

        
            if($sale->product_id==$product->id) 
            {
                

                $oferta=$sale->descuento;

                
            }
        }
        

        return view('product.review',['score' => $score_average], compact('product', 'reviews', 'users', 'oferta'));
    }

    public function newProductPost(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required|numeric',
                'image' => 'required|mimes:jpeg,jpg,png|max:10240',
            ]
        );

        $imageName = $request->image->getClientOriginalName();
        $imageRoute = "/img/" . $imageName;
        $request->image->move(public_path('img'), $imageName);
        $name = $request->name;
        $price = $request->price;
        $author = Author::where('name', '=', $request->author)->first();
        $genre = Genre::where('name', '=', $request->genre)->first();


        $product = Product::create(
            [
                'name' => $name,
                'price' => $price,
                'img' => $imageRoute,
            ]
        );
        $product->save();
        $product->author()->associate($author);
        $product->genre()->associate($genre);
        $product->save();
        session()->flash('message', 'Producto añadido correctamente');
        return redirect()->action([ProductController::class, 'index']);
    }

    //pasar el id por aqui
    public function updateProductGet($id)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $product = Product::findOrFail($id);
        return view('product.update', ['product' => $product], compact('authors', 'genres'));
    }

    public function updateProduct(Request $request, $id)
    {
        if ($request->has('name') && $request->has('price')) {
            $request->validate(
                    [
                        'name' => 'required',
                        'price' => 'required|numeric',
                        'image' => 'required|mimes:jpeg,jpg,png|max:10240',
                    ]
                );
            $imageName = $request->image->getClientOriginalName();
            $imageRoute = "/img/" . $imageName;
            $request->image->move(public_path('img'), $imageName);
            $name = $request->name;
            $price = $request->price;
            $author = Author::where('name', '=', $request->author)->first();
            $genre = Genre::where('name', '=', $request->genre)->first();

            $product = Product::findOrFail($id);
            $product->name = $name;
            $product->price = $price;
            $product->img = $imageRoute;
            $product->save();
            $product->author()->associate($author);
            $product->genre()->associate($genre);
            $product->save();
            session()->flash('message', 'Producto actualizado correctamente');
            return redirect()->action([ProductController::class, 'index']);
        }
    }

    public function deleteProduct($id)
    {
        // Esto estaría mejor cambiarlo a un atributo booleano en products
        $product = Product::findOrFail($id);
        if ($product->ordered) {
            return redirect()->back()->withErrors("Este producto no puede ser eliminado, tiene productos que pertenecen a un pedido");
        } else {
            $product->delete();
            session()->flash('message', 'Producto eliminado correctamente');
            return redirect()->back();
        }
    }

    public function sortProducts()
    {
        $name = 'name';
        $products = Product::orderBy($name)->paginate(3);

        return view('product.index', ['products' => $products, 'sort' => $name]);
    }

    public function detailed($id)
    {
        $sales = Sale::All();
        $product = Product::find($id);
        $score = Review::where('product_id', '=', $id)->avg('score');

        $oferta = 0;

        foreach ($sales as $sale)  
        {

        
            if($sale->product_id==$product->id) 
            {
                

                $oferta=$sale->descuento;

                
            }
        }
        

        return view('product.detailed', compact('product', 'score', 'oferta'));
    }

    //Selecciona los últimos 5 productos creados en tu base de datos y los pasa a la vista de inicio.
    public function inicio()
    {
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();
        return view('inicio', ['products' => $products]);
    }

    public function allProducts()
    {
        // Obtiene todos los productos de la base de datos
        $products = Product::all();

        // Pasa los productos a la vista
        return view('product.all', ['products' => $products]);
    }
}
