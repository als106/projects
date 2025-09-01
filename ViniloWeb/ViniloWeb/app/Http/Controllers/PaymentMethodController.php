<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        $shoppingCart = auth()->user()->shoppingcart;
        return view('payment_methods.index', ['paymentMethods' => $paymentMethods, 'shoppingCart' => $shoppingCart]);
    }

    public function create()
    {
        return view('payment_methods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        PaymentMethod::create($request->all());

        return redirect()->route('payment_methods.index')
            ->with('success', 'Método de pago creado correctamente.');
    }
}
