<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('orders')->delete();

        $product1 = Product::where('name', '=', 'Paquito el chocolatero')->first();
        $product2 = Product::where('name', '=', 'SICKO MODE')->first();
        $user2 = User::where('name', '=', 'Juan Antonio Sánchez García')->first();
        $order = new Order
        (
            [
                'status' => 'En Preparación'
            ]
        );
        $order->save();
        $order->user()->associate($user2);
        $product1->ordered = true;$product2->ordered = true;
        $product1->save();$product2->save();
        $order->products()->attach($product1->id);
        $order->products()->attach($product2->id);
        $order->save();

        $user3 = User::where('name', '=', 'Laura Díaz Herrero')->first();
        $order = new Order
        (
            [
                'status' => 'Preparado'
            ]
        );
        $order->save();
        $order->user()->associate($user3);
        $order->products()->attach($product2->id);
        $order->save();

        $user1 = User::where('name', '=', 'Carlos Sempere Martínez')->first();
        $order = new Order
        (
            [
                'status' => 'Confirmado'
            ]
        );
        $order->save();
        $order->user()->associate($user1);
        $order->products()->attach($product1->id);
        $order->save();

        $user4 = User::where('name', '=', 'Susana García Abad')->first();
        $order = new Order
        (
            [
                'status' => 'Entregado'
            ]
        );
        $order->save();
        $order->user()->associate($user4);
        $order->products()->attach($product2->id);
        $order->save();

        $user2 = User::where('name', '=', 'Juan Antonio Sánchez García')->first();
        $order = new Order
        (
            [
                'status' => 'Anulado'
            ]
        );
        $order->save();
        $order->user()->associate($user2);
        $order->products()->attach($product1->id);
        $order->products()->attach($product2->id);
        $order->save();

        $product1 = Product::where('name', '=', 'Paquito el chocolatero')->first();
        $product2 = Product::where('name', '=', 'Nothing Else Matters')->first();
        $user2 = User::where('name', '=', 'Juan Antonio Sánchez García')->first();
        $order = new Order
        (
            [
                'status' => 'En Preparación'
            ]
        );
        $order->save();
        $order->user()->associate($user2);
        $product1->ordered = true; $product2->ordered = true;
        $product1->save(); $product2->save();
        $order->products()->attach($product1->id);
        $order->products()->attach($product2->id);
        $order->save();

        $product1 = Product::where('name', '=', 'Malamente')->first();
        $user3 = User::where('name', '=', 'Laura Díaz Herrero')->first();
        $order = new Order
        (
            [
                'status' => 'Confirmado'
            ]
        );
        $order->save();
        $order->user()->associate($user3);
        $product1->ordered = true;
        $product1->save();
        $order->products()->attach($product1->id);
        $order->save();

        $product1 = Product::where('name', '=', 'With or Without You')->first();
        $product2 = Product::where('name', '=', 'Lose Yourself')->first();
        $user4 = User::where('name', '=', 'Susana García Abad')->first();
        $order = new Order
        (
            [
                'status' => 'Entregado'
            ]
        );
        $order->save();
        $order->user()->associate($user4);
        $product1->ordered = true; $product2->ordered = true;
        $product1->save(); $product2->save();
        $order->products()->attach($product1->id);
        $order->products()->attach($product2->id);
        $order->save();

        $product1 = Product::where('name', '=', 'Hello')->first();
        $user1 = User::where('name', '=', 'Carlos Sempere Martínez')->first();
        $order = new Order
        (
            [
                'status' => 'Anulado'
            ]
        );
        $order->save();
        $order->user()->associate($user1);
        $product1->ordered = true;
        $product1->save();
        $order->products()->attach($product1->id);
        $order->save();

    }
}
