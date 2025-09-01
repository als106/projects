<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Sale;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {

        DB::table('sales')->delete();

        $product1 = Product::where('id', '=', 2)->first();
        $sale1 = new Sale
        (
            [
                'descuento' => 40,
            ]
        );
        $sale1->save();
        $sale1->product()->associate($product1);
        $sale1->save();



        $product2 = Product::where('id', '=', 4)->first();
        $sale2 = new Sale
        (
            [
                'descuento' => 25,
            ]
        );
        $sale2->save();
        $sale2->product()->associate($product2);
        $sale2->save();      
    }
}
