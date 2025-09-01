<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('genres')->delete();

        $author = new Genre
        (
            [
                'name' => 'Trap',
                'img' => '/img/genre/trap.jpg'
            ]
        );
        $author->save();

        $author = new Genre
        (
            [
                'name' => 'Rock',
                'img' => '/img/genre/rock.jpg'
            ]
        );
        $author->save();

        $author = new Genre
        (
            [
                'name' => 'Rap' ,
                'img' => '/img/genre/rap.jpg'
            ]
        );
        $author->save();

        $author = new Genre
        (
            [
                'name' => 'Pop',
                'img' => '/img/genre/pop.jpg'
            ]
        );
        $author->save();

        $author = new Genre
        (
            [
                'name' => 'Fiestuki',
                'img' => '/img/genre/fiesta.jpg'
            ]
        );
        $author->save();

        $author = new Genre
        (
            [
                'name' => 'Heavy Metal',
                'img' => '/img/genre/metal.jpg'
            ]
        );
        $author->save();

        $author = new Genre
        (
            [
                'name' => 'Dance',
                'img' => '/img/genre/dance.jpg'
            ]
        );
        $author->save();

        $author = new Genre
        (
            [
                'name' => 'Reggaeton',
                'img' => '/img/genre/reggaeton.jpg'
            ]
        );
        $author->save();


        $author = new Genre
        (
            [
                'name' => 'Indie',
                'img' => '/img/genre/indie.jpg'
            ]
        );
        $author->save();


        $author = new Genre
        (
            [
                'name' => 'Jazz',
                'img' => '/img/genre/jazz.jpg'
            ]
        );
        $author->save();


        $author = new Genre
        (
            [
                'name' => 'Soul',
                'img' => '/img/genre/soul.jpg'
            ]
        );
        $author->save();


        $author = new Genre
        (
            [
                'name' => 'Clasica',
                'img' => '/img/genre/clasica.jpg'
            ]
        );
        $author->save();
    }
}
