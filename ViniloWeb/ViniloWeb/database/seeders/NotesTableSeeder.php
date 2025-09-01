<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            ['text' => '- Recordar enviar ultimos pedidos
            - Añadir nuevas ofertas 
            - Tengo que planificar una reunión con el equipo de diseño']
        ]);
    }
}
