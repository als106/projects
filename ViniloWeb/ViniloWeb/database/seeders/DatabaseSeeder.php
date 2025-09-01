<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        //$this->call(StockTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ShoppingcartsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(NotesTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        
    }
}
