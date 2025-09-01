<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;

class WishlistController extends Controller
{    
    public function index()
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->first();
        
        if(!$wishlist){
            $wishlist = new Wishlist();
            $wishlist->user()->associate($user);
            $wishlist->save();
        }
        
        $wishlist->load('products'); // Carga los productos de la wishlist.
        
        return view('wishlist.index', ['wishlist' => $wishlist]);
    }
    
    

    public function create()
    {
        $user = Auth::user();
        $wishlist = new Wishlist();
        $wishlist->user()->associate($user);
        $wishlist->save();
        return view('wishlist.index', ['wishlist' => $wishlist]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'products' => 'required',
            ] 
        );
        $user = Auth::user();
        $products = $request->input('products');
        
        $wishlist = Wishlist::where([['user_id', '=',$user['id']]])->get();
        if($wishlist->isEmpty()){
            $wishlist = new Wishlist();
            $wishlist->user()->associate($user);
            $wishlist->save();
        }        
        $product = Product::findOrFail($products);
        $product->stock()->increment('sold');
        $product->stock()->decrement('stock');
        $product->wishlist()->attach($wishlist->id, ['product_id' => $product->id]);
        session()->flash('message', 'Producto añadido a favoritos');
        return redirect()->action([ProductController::class, 'index']);
    }

    public function add(Product $product)
    {
        $user = Auth::user();
        $wishlist = Wishlist::firstOrCreate(['user_id' => $user->id]);
        $wishlist->products()->syncWithoutDetaching($product->id);
        
        return back();
    }

    public function hasProduct(Product $product)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $wishlist = Wishlist::where('user_id', $user->id)->first();
    
            if (!$wishlist) {
                return false;
            }
    
            return $wishlist->products->contains($product->id);

        }
    
        return redirect('login');
    }
    
    public function remove(Product $product)
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->first();

        if ($wishlist) {
            $wishlist->products()->detach($product->id);
        }
            
        return back();
    }



}
