<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stock')->delete();

        $product = Product::where('name', '=', 'Paquito el chocolatero')->first();
        $stock = new Stock(
            [
                'sold' => 20,
            ]
        );
        $stock->product()->associate($product);
        $stock->save();
        $product->save();

        $product = Product::where('name', '=', 'SICKO MODE')->first();
        $stock = new Stock();
        $stock->product()->associate($product);
        $stock->save();
        $product->save();

        $product = Product::where('name', '=', 'Nothing Else Matters')->first();
        $stock = new Stock(
            [
                'sold' => 15,
            ]
        );
        $stock->product()->associate($product);
        $stock->save();
        $product->save();

        $product = Product::where('name', '=', 'Malamente')->first();
        $stock = new Stock();
        $stock->product()->associate($product);
        $stock->save();
        $product->save();

        $product = Product::where('name', '=', 'With or Without You')->first();
        $stock = new Stock();
        $stock->product()->associate($product);
        $stock->save();

        $product = Product::where('name', '=', 'Lose Yourself')->first();
        $stock = new Stock(
            [
                'sold' => 15,
            ]
        );
        $stock->product()->associate($product);
        $stock->save();

        $product = Product::where('name', '=', 'Hello')->first();
        $stock = new Stock();
        $stock->product()->associate($product);
        $stock->save();
    }
}
