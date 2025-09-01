<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Author;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::join('authors', 'products.author_id', '=', 'authors.id')
            ->where('products.name', 'LIKE', "%$query%")
            ->orWhere('authors.name', 'LIKE', "%$query%")
            ->select('products.*')
            ->get();

        $authors = Author::where('name', 'LIKE', "%$query%")->get();

        return view('search.results', ['products' => $products, 'query' => $query, 'authors' => $authors]);
    }
}
