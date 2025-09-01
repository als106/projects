<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::paginate(5);
        return view('order.index', ['orders' => $order]);
    }

    public function show($id){
        $order = Order::findOrFail($id);
        return view('order.show', ['order' => $order]);
    }

    public function newOrderGet(){
        $products = Product::all();
        return view('order.create', ['products' => $products]);
    }

    public function newOrderPost(Request $request)
    {
        $request->validate(
            [
                'status' => 'required',
                'products' => 'required',
            ] 
        );
        //Revisar user_id porque siempre es 1
        $user = auth()->user();
        //$user = User::currentUser();
        $products = $request->input('products');
    
        $order = new Order();
        $order->status = $request->input('status');
        $order->user()->associate($user);
        //print($user->id);
        //$order->user_id=$user->id;
        $order->save();
        foreach ($products as $productId) {
            $product = Product::findOrFail($productId);
            $product->ordered = true;
            $product->save();
            //$order->products()->attach($product);
            $order->products()->attach($product, ['order_id' => $order->id]);
        }
    
        return redirect()->action([ProductController::class, 'inicio']);     
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->products()->detach(); // Elimina registros en la tabla intermedia
        $order->delete(); // Elimina el registro del pedido de la tabla "orders"
        return redirect()->action([OrderController::class, 'index']);
    }

    public function updateOrderGet($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all();
        $orderProductsIds = $order->products()->pluck('product_id')->toArray();
    
        return view('order.update', compact('order', 'products', 'orderProductsIds'));
    }
    

    public function updateOrderPost(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        $order->products()->sync($request->input('products'));

        return redirect()->action([OrderController::class, 'index']);    
    }

    public function sortOrders(Request $request)
    {
        $orderBy = $request->input('orderBy');
        
        if ($orderBy == 'status')
            $orders = Order::orderBy('status')->paginate(10);
        else
            $orders = Order::orderBy('created_at')->paginate(10);
        
        return view('order.index', ['orders' => $orders]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $orders = Order::whereHas('products', function($q) use ($query) {
                $q->where('name', 'LIKE', '%'.$query.'%');
            })
            ->orWhere('status', 'LIKE', '%'.$query.'%')
            ->paginate(10);

        return view('order.index', compact('orders'));
    }

}
    




