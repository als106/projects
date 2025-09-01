<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Stock;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {

        DB::table('products')->delete();

        $author = Author::where('name', '=', 'King África')->first();
        $genre = Genre::where('name', '=', 'Fiestuki')->first();
        $product1 = new Product(
                [
                    'name' => 'Paquito el chocolatero',
                    'price' => 17.20,
                    'img' => '/img/product/img1.png',
                ]
            );
        $product1->save();
        $product1->author()->associate($author);
        $product1->genre()->associate($genre);
        $stock = new Stock(
            [
                'sold' => 7,
            ]
        );
        $stock->product()->associate($product1);
        $stock->save();
        $product1->save();

        $product1 = new Product(
                [
                    'name' => 'Salta 2000',
                    'price' => 4.20,
                    'img' => '/img/product/salta2000.jpg',
                ]
            );
        $product1->save();
        $product1->author()->associate($author);
        $product1->genre()->associate($genre);
        $stock = new Stock();
        $stock->product()->associate($product1);
        $stock->save();
        $product1->save();

        $product1 = new Product(
                [
                    'name' => 'Bomba 2002',
                    'price' => 42.0,
                    'img' => '/img/product/bomba.jpg',
                ]
            );
        $product1->save();
        $product1->author()->associate($author);
        $product1->genre()->associate($genre);
        $stock = new Stock(
            [
                'sold' => 15,
            ]
        );
        $stock->product()->associate($product1);
        $stock->save();
        $product1->save();

        $author = Author::where('name', '=', 'Travis Scott')->first();
        $genre = Genre::where('name', '=', 'Trap')->first();
        $product1 = new Product(
                [
                    'name' => 'SICKO MODE',
                    'price' => 23.99,
                    'img' => '/img/product/img2.jpg',
                ]
            );
        $product1->save();
        $product1->author()->associate($author);
        $product1->genre()->associate($genre);
        $stock = new Stock();
        $stock->product()->associate($product1);
        $stock->save();
        $product1->save();

        $author = Author::where('name', 'Metallica')->first();
        $genre = Genre::where('name', 'Heavy Metal')->first();

        $product3 = new Product([
            'name' => 'Nothing Else Matters',
            'price' => 25.99,
            'img' => '/img/product/img3.jpg',
        ]);
        $product3->save();
        $product3->author()->associate($author);
        $product3->genre()->associate($genre);
        $stock = new Stock(
            [
                'sold' => 15,
            ]
        );
        $stock->product()->associate($product3);
        $stock->save();
        $product3->save();

        $author = Author::where('name', 'Rosalía')->first();
        $genre = Genre::where('name', 'Pop')->first();

        $product4 = new Product([
            'name' => 'Malamente',
            'price' => 18.99,
            'img' => '/img/product/img4.jpg',
        ]);
        $product4->save();
        $product4->author()->associate($author);
        $product4->genre()->associate($genre);
        $stock = new Stock(
            [
                'sold' => 20,
            ]
        );
        $stock->product()->associate($product4);
        $stock->save();
        $product4->save();

        $author = Author::where('name', 'U2')->first();
        $genre = Genre::where('name', 'Rock')->first();

        $product5 = new Product([
            'name' => 'With or Without You',
            'price' => 19.99,
            'img' => '/img/product/img5.jpg',
        ]);
        $product5->save();
        $product5->author()->associate($author);
        $product5->genre()->associate($genre);
        $stock = new Stock();
        $stock->product()->associate($product5);
        $stock->save();
        $product5->save();

        $author = Author::where('name', 'Eminem')->first();
        $genre = Genre::where('name', 'Rap')->first();

        $product6 = new Product([
            'name' => 'Lose Yourself',
            'price' => 22.99,
            'img' => '/img/product/img6.jpg',
        ]);
        $product6->save();
        $product6->author()->associate($author);
        $product6->genre()->associate($genre);
        $stock = new Stock();
        $stock->product()->associate($product6);
        $stock->save();
        $product6->save();

        $author = Author::where('name', 'Adele')->first();
        $genre = Genre::where('name', 'Pop')->first();

        $product7 = new Product([
            'name' => 'Hello',
            'price' => 16.99,
            'img' => '/img/product/img7.jpg',
        ]);
        $product7->save();
        $product7->author()->associate($author);
        $product7->genre()->associate($genre);
        $stock = new Stock(
            [
                'sold' => 20,
            ]
        );
        $stock->product()->associate($product7);
        $stock->save();
        $product7->save();
    }
}
