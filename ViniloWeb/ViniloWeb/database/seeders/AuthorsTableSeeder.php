<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Genre;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('authors')->delete();

        $genre = Genre::where('name', '=', 'Fiestuki')->first();
        $author = new Author(
                [
                    'name' => 'King África',
                    'description' => 'King África fue una banda argentina de dance latino, pop latino y música tropical creada en 1992 en Buenos Aires por Dero, Tuti Gianakis y los hermanos Alejandro y Nicolás Guerrieri para su sello musical Oid Mortales Records. Su primer solista fue el rapero Martin Laacré entre 1992 y 1996.',
                    'img' => '/img/author/KING_AFRICA.jpg',
                ]
            );
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Reggaeton')->first();
        $author = new Author(
                [
                    'name' => 'Rosalía',
                    'description' => 'Es una cantante, compositora y actriz española nacida en Barcelona en 1993. Es conocida por su innovadora fusión de la música flamenca con sonidos urbanos y electrónicos, lo que le ha valido el reconocimiento mundial.',
                    'img' => '/img/author/rosalia.jpg',
                ]
            );
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Rock')->first();
        $author = new Author(
                [
                    'name' => 'U2',
                    'description' => 'U2 es una banda de rock irlandesa formada en Dublín en 1976. Su música es reconocida por sus letras poéticas y comprometidas, y por sus arreglos instrumentales épicos que combinan elementos de rock, pop y música electrónica',
                    'img' => '/img/author/U2.jpg',
                ]
            );
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Pop')->first();
        $author = new Author(
                [
                    'name' => 'Estopa',
                    'description' => 'Estopa es una banda de música española formada por los hermanos David y José Manuel Muñoz en 1999 en Cornellà de Llobregat, Barcelona. Su estilo musical se basa en la fusión de la rumba flamenca con el rock y el pop, y han sido reconocidos por su habilidad para combinar letras pegajosas y melodías bailables',
                    'img' => '/img/author/estopa.jpg',
                ]
            );
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Rap')->first();
        $author = new Author([
            'name' => 'Eminem',
            'description' => 'Eminem es un rapero, productor musical y actor estadounidense conocido por sus letras controvertidas y su estilo único de rap. Nació en 1972 en Detroit, Michigan.',
            'img' => '/img/author/eminem.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Pop')->first();
        $author = new Author([
            'name' => 'Adele',
            'description' => 'Adele es una cantante y compositora británica conocida por su poderosa voz y sus canciones emotivas. Nació en 1988 en Tottenham, Londres.',
            'img' => '/img/author/adele.jpeg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Heavy Metal')->first();
        $author = new Author([
            'name' => 'Metallica',
            'description' => 'Metallica es una banda de heavy metal estadounidense formada en Los Ángeles en 1981. Su música es conocida por su potencia y sus letras introspectivas.',
            'img' => '/img/author/metallica.jpeg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Rock')->first();
        $author = new Author([
            'name' => 'Queen',
            'description' => 'Queen es una banda de rock británica formada en Londres en 1970. Su música es conocida por sus letras poéticas y su estilo teatral.',
            'img' => '/img/author/queen.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Rock')->first();
        $author = new Author([
            'name' => 'AC/DC',
            'description' => 'AC/DC es una banda de rock australiana formada en Sídney en 1973. Su música es conocida por sus riffs de guitarra potentes y su energía en el escenario.',
            'img' => '/img/author/AC_DC.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Pop')->first();
        $author = new Author([
            'name' => 'Coldplay',
            'description' => 'Coldplay es una banda de rock británica formada en Londres en 1996. Su música es conocida por sus arreglos instrumentales atmosféricos y sus letras emotivas.',
            'img' => '/img/author/coldplay.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Dance')->first();
        $author = new Author([
            'name' => 'Shakira',
            'description' => 'Shakira es una cantante, compositora y bailarina colombiana nacida en 1977. Es conocida por su estilo musical ecléctico y sus movimientos de cadera.',
            'img' => '/img/author/shakira.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Pop')->first();
        $author = new Author([
            'name' => 'Beyoncé',
            'description' => 'Beyoncé es una cantante, actriz y bailarina estadounidense. Es conocida por su poderosa voz, su estilo de baile y su capacidad para combinar diferentes géneros musicales.',
            'img' => '/img/author/beyonce.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $author = new Author([
            'name' => 'Ed Sheeran',
            'description' => 'Ed Sheeran es un cantante y compositor británico. Es conocido por sus canciones emotivas y su habilidad para combinar diferentes géneros musicales.',
            'img' => '/img/author/ed_sheeran.jpeg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Pop')->first();
        $author = new Author([
            'name' => 'Ariana Grande',
            'description' => 'Ariana Grande es una cantante, actriz y compositora estadounidense. Es conocida por su poderosa voz y su estilo musical pop y R&B.',
            'img' => '/img/author/ariana_grande.jpeg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $author = new Author([
            'name' => 'Taylor Swift',
            'description' => 'Taylor Swift es una cantante y compositora estadounidense. Es conocida por sus canciones emotivas y su habilidad para contar historias a través de su música.',
            'img' => '/img/author/taylor_swift.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $author = new Author([
            'name' => 'Justin Bieber',
            'description' => 'Justin Bieber es un cantante y compositor canadiense. Es conocido por su estilo musical pop y su capacidad para conectarse con su audiencia a través de su música.',
            'img' => '/img/author/justin_bieber.jpeg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();
        
        $author = new Author([
            'name' => 'Lady Gaga',
            'description' => 'Lady Gaga es una cantante, actriz y compositora estadounidense. Es conocida por su estilo musical pop y su habilidad para crear espectáculos en vivo innovadores y llamativos.',
            'img' => '/img/author/lady_gaga.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $author = new Author([
            'name' => 'Bruno Mars',
            'description' => 'Bruno Mars es un cantante, compositor y productor estadounidense. Es conocido por su estilo musical pop y su habilidad para combinar diferentes géneros musicales.',
            'img' => '/img/author/bruno_mars.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();
        
        $genre = Genre::where('name', '=', 'Trap')->first();
        $author = new Author([
            'name' => 'Drake',
            'description' => 'Drake es un rapero, cantante y compositor canadiense. Es conocido por su estilo musical hip hop y su habilidad para escribir letras emotivas que conectan con su audiencia.',
            'img' => '/img/author/drake.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();


        $genre = Genre::where('name', '=', 'Pop')->first();
        $author = new Author([
            'name' => 'Rihanna',
            'description' => 'Rihanna es una cantante, actriz y empresaria de Barbados. Es conocida por su estilo musical pop y R&B y su capacidad para reinventarse constantemente.',
            'img' => '/img/author/rihanna.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $author = new Author([
            'name' => 'Katy Perry',
            'description' => 'Katy Perry es una cantante y compositora estadounidense. Es conocida por su estilo musical pop y su capacidad para crear canciones pegadizas y emocionales.',
            'img' => '/img/author/katy_perry.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $author = new Author([
            'name' => 'The Weeknd',
            'description' => 'The Weeknd es un cantante, compositor y productor canadiense. Es conocido por su estilo musical R&B y su habilidad para crear canciones emotivas y melancólicas.',
            'img' => '/img/author/theweeknd.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Trap')->first();
        $author = new Author([
            'name' => 'Billie Eilish',
            'description' => 'Billie Eilish es una cantante y compositora estadounidense. Es conocida por su estilo musical indie pop y su habilidad para crear canciones introspectivas y emotivas.',
            'img' => '/img/author/billie_eilish.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Trap')->first();
        $author = new Author([
            'name' => 'Post Malone',
            'description' => 'Post Malone es un rapero, cantante y compositor estadounidense. Es conocido por su estilo musical hip hop y su habilidad para crear canciones emotivas y pegadizas.',
            'img' => '/img/author/post_malone.jpeg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Trap')->first();
        $author = new Author([
            'name' => 'Travis Scott',
            'description' => 'Travis Scott es un rapero, cantante y productor estadounidense. Es conocido por su estilo musical hip hop y su capacidad para crear canciones con atmósferas inmersivas.',
            'img' => '/img/author/travis_scott.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Rap')->first();
        $author = new Author([
            'name' => 'Lizzo',
            'description' => 'Lizzo es una cantante, rapera y flautista estadounidense. Es conocida por su estilo musical pop y hip hop y su mensaje de aceptación y amor propio.',
            'img' => '/img/author/lizzo.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Indie')->first();
        $author = new Author([
            'name' => 'Postmodern Jukebox',
            'description' => 'Postmodern Jukebox es una banda estadounidense de música retro y vintage. Son conocidos por su estilo musical que mezcla diferentes géneros y su habilidad para reinventar canciones populares en un estilo vintage.',
            'img' => '/img/author/postmodern_jukebox.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Pop')->first();
        $author = new Author([
            'name' => 'Imagine Dragons',
            'description' => 'Imagine Dragons es una banda estadounidense de rock alternativo. Son conocidos por su estilo musical que combina rock y electrónica y sus letras emotivas.',
            'img' => '/img/author/imagine_dragons.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Pop')->first();
        $author = new Author([
            'name' => 'Maroon 5',
            'description' => 'Maroon 5 es una banda estadounidense de pop rock. Son conocidos por su estilo musical pop y sus canciones pegadizas y emotivas.',
            'img' => '/img/author/maroon5.png',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();

        $genre = Genre::where('name', '=', 'Pop')->first();
        $author = new Author([
            'name' => 'One Direction',
            'description' => 'One Direction fue una banda británica de pop formada en 2010. Son conocidos por su estilo musical pop y sus canciones pegadizas.',
            'img' => '/img/author/one_direction.jpg',
        ]);
        $author->genre()->associate($genre);
        $genre->authors()->save($author);
        $author->save();
    }
}
