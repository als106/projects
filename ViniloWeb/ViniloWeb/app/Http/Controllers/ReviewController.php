<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review($id)
    {
        $product = Product::find($id);
        return view('review.forms', compact('product', 'id'));
    }

    public function post(Request $request, $id)
    {
        $request->validate(
            [
                'review' => 'required',
                'opciones' => 'required',
            ]
        );

        $product = Product::findOrFail($id);
        $score = $request->opciones;
        $review_text = $request->review;
        $user = User::findOrFail(Auth::id());       //CAMBIAR ESTA LINEA POR EL ID DEL USUARIO REGISTRADO
        $review = new Review(
            [
                'score' => $score,
                'review' => $review_text,
            ]
        );
        $user->reviews()->save($review);
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        return redirect()->action([ProductController::class, 'reviewDisplay'], [$id]);
    }
}
