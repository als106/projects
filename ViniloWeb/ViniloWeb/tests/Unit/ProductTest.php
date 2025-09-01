<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Author;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\assertEquals;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
    public function testProductAuthorRel()
    {
        /**
         * A basic unit test example.
         *
         * @return void
         */
       
        //id name description
        $product1 = new Product(
            [
                'name' => 'Paquito el chocolatero' ,
                'genre' => 'Paso doble',
                'price' => '17.20',
                'author_id' => 1,
            ]);
        $product1->save();
        $product2 = new Product(
            [
                'name' => 'Salta 2000' ,
                'genre' => 'Merengue & Reggaeton',
                'price' => '23.99',
                'author_id' => 1,
            ]);
        $product2->save();
        
        $author1 = new Author(
            [
                'name' => 'King África' ,
                'description' => 'King África fue una banda argentina de dance latino, pop latino y música tropical creada en 1992 en Buenos Aires por Dero, Tuti Gianakis y los hermanos Alejandro y Nicolás Guerrieri para su sello musical Oid Mortales Records. Su primer solista fue el rapero Martin Laacré entre 1992 y 1996.',
            ]
        );
        $author1->save();
        
        //PRUEBAS BÁSICAS
        $this->assertEquals($product1->name, 'Paquito el chocolatero');
        $this->assertEquals($product2->name, 'Salta 2000');

       
        $author1->products()->saveMany(
            [
                $product1,
                $product2
            ]
        );
        //--- Prueba de las relaciones ---
        $author = Product::find(1)->author;
        $this->assertEquals($author->name, 'King África');
        $products = Author::find(1)->products;
        $array = array('Paquito el chocolatero', 'Salta 2000');
        $temp = 0;
        foreach($products as $product)
        {
            $this->assertEquals($product->name, $array[$temp]);
            $temp += 1;
        }

        $author1->delete();
        $product1->delete();
        $product2->delete();

    }

    public function testProductOrderRel()
    {
        $author1 = new Author(
            [
                'name' => 'King África' ,
                'description' => 'King África fue una banda argentina de dance latino, pop latino y música tropical creada en 1992 en Buenos Aires por Dero, Tuti Gianakis y los hermanos Alejandro y Nicolás Guerrieri para su sello musical Oid Mortales Records. Su primer solista fue el rapero Martin Laacré entre 1992 y 1996.',
            ]
        );
        $author1->save();

        $product1 = new Product(
            [
                'name' => 'Paquito el chocolatero' ,
                'genre' => 'Paso doble',
                'price' => '17.20',
                'author_id' => 1,
            ]);
        $product1->save();
        $product2 = new Product(
            [
                'name' => 'Salta 2000' ,
                'genre' => 'Merengue & Reggaeton',
                'price' => '23.99',
                'author_id' => 1,
            ]);
        $product2->save();

        $author1->products()->saveMany(
            [
                $product1,
                $product2
            ]
        );
        $product1->author()->associate($author1);
        $product2->author()->associate($author1);

        $user1 = new User(
            [
                'name' => 'Carlos Sempere Martínez',
                'email' => 'carasdasdainez@gmail.com',
                'password' => 'elamigos112'
            ]
        );
        $user1->save();

        $order1 = new Order(
            [
                'status' => 'Enviado',
                'user_id' => 1,
                'product_id' => 1,
            ]
        );
        $order1->save();

        $order1->products()->attach($product1->id);
        $product2->orders()->attach($order1->id);
    

        //PROBANDO RELACIONES
        $products = Order::find(1)->products;
        $array = array('Paquito el chocolatero', 'Salta 2000');
        $temp = 0;
        foreach($products as $product)
        {
            $this->assertEquals($product->name, $array[$temp]);
            $temp += 1;
        }

        $author1->delete();
        $product1->delete();
        $product2->delete();
        $user1->delete();
        $order1->delete();
    }


}
