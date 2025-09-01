<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Models\Product;

class AuthorTest extends TestCase
{
    
    public function testAuthorProductRel()
    {
        /**
         * A basic unit test example.
         *
         * @return void
         */
        
        //id name description
        $author1 = new Author(
            [
                'name' => 'King África' ,
                'description' => 'King África fue una banda argentina de dance latino, pop latino y música tropical creada en 1992 en Buenos Aires por Dero, Tuti Gianakis y los hermanos Alejandro y Nicolás Guerrieri para su sello musical Oid Mortales Records. Su primer solista fue el rapero Martin Laacré entre 1992 y 1996.',
            ]);
        $author1->save();
        $author2 = new Author(
            [
                'name' => 'Travis Scott' ,
                'description' => 'Travis Scott es un rapero, cantante, compositor y productor musical estadounidense nacido en Houston, Texas en 1991. Es conocido por su estilo de producción único, que combina elementos del hip-hop, el trap y la música electrónica.',
            ]);
        $author2->save();
     
        $author1->products()->saveMany(
            [
                new Product(
                    [
                        'name' => 'Paquito el chocolatero' ,
                        'genre' => 'Paso doble',
                        'price' => '17.20',
                        'author' => '1',
                    ]),
                new Product(
                    [
                        'name' => 'Salta 2000' ,
                        'genre' => 'Merengue & Reggaeton',
                        'price' => '23.99',
                        'author' => '1',
                    ])

            ]);
        
        

        //PRUEBAS BÁSICAS
        $this->assertEquals($author1->name, 'King África');
        $this->assertEquals($author2->name, 'Travis Scott');

        //PRUEBAS BÁSICAS
        $product1 = Product::find(1);
        $this->assertEquals($product1->name, 'Paquito el chocolatero');
        $product1->author()->associate($author1);
        $product1->save();

        $product2 = Product::find(2);
        $this->assertEquals($product2->name, 'Salta 2000');
        $product2->author()->associate($author2);
        $product2->save();

        //--- Prueba de las relaciones ---
        $products = Author::find(1)->products;
        $array = array('Paquito el chocolatero', 'Salta 2000');
        $temp = 0;
        foreach($products as $product)
        {
            $this->assertEquals($product->name, $array[$temp]);
            $temp += 1;
        }



        $author1->delete();
        $author2->delete();
        $product1->delete();
        $product2->delete();

    }
}
