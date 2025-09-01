<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->delete();

        // ============= REVIEW 1 =====================
        $product = Product::where('name', '=', 'Paquito el chocolatero')->first();
        $user = User::where('name', '=', 'Carlos Sempere Martínez')->first();
        $review = new Review(
            [
                'score' => 5,
                'review' => 'Este album me ha cambiado la vida. Ahora que puedo escuchar a Paquito el chocolatero en la comodidad de mi hogar soy mucho más feliz, gracias al rey por tan buena música.'
            ]
        );
        $user->reviews()->save($review);
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 2 =====================
        $product = Product::where('name', '=', 'SICKO MODE')->first();
        $review = new Review(
            [
                'score' => 4,
                'review' => 'Este álbum es increíble. Cada canción me transporta a otro mundo y me llena de alegría. ¡Definitivamente lo recomendaría!'
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 3 =====================
        $product = Product::where('name', '=', 'Malamente')->first();
        $review = new Review(
            [
                'score' => 2,
                'review' => 'No estoy impresionado con este álbum. Las canciones carecen de originalidad y no me transmiten ninguna emoción.'
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 4 =====================
        $user = User::where('name', '=', 'Juan Antonio Sánchez García')->first();
        $product = Product::where('name', '=', 'Paquito el chocolatero')->first();
        $review = new Review(
            [
                'score' => 5,
                'review' => '¡Este álbum es una obra maestra! Cada canción es perfecta y las letras son profundas. No puedo dejar de escucharlo.'
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 5 =====================
        $product = Product::where('name', '=', 'Lose Yourself')->first();
        $review = new Review(
            [
                'score' => 1,
                'review' => 'Este álbum es terrible. Las canciones son aburridas y la voz del cantante es insoportable. No lo recomendaría en absoluto.'
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 6 =====================
        $product = Product::where('name', '=', 'With or Without You')->first();
        $review = new Review(
            [
                'score' => 4,
                'review' => 'Gran álbum. Me encanta.'
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 7 =====================
        $product = Product::where('name', '=', 'SICKO MODE')->first();
        $review = new Review(
            [
                'score' => 3,
                'review' => 'Este álbum es decente. Algunas canciones son buenas, otras no tanto. No me impactó demasiado.'
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 8 =====================
        $user = User::where('name', '=', 'Laura Díaz Herrero')->first();
        $review = new Review(
            [
                'score' => 5,
                'review' => 'Este álbum me llega al corazón. Cada melodía me hace sentir vivo y me hace reflexionar sobre la belleza de la vida.'
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 9 =====================
        $product = Product::where('name', '=', 'Nothing Else Matters')->first();
        $review = new Review(
            [
                'score' => 2,
                'review' => 'Me esperaba mucho más de este álbum. Las canciones son genéricas y carecen de originalidad.'
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 10 =====================
        $product = Product::where('name', '=', 'Paquito el chocolatero')->first();
        $review = new Review(
            [
                'score' => 4,
                'review' => 'Este álbum me motiva a superar cualquier obstáculo. Las letras son poderosas y la música es enérgica.'
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();

        // ============= REVIEW 11 =====================
        $product = Product::where('name', '=', 'Malamente')->first();
        $review = new Review(
            [
                'score' => 3,
                'review' => 'Este álbum tiene sus altibajos. Algunas canciones son geniales, otras no tanto.',
            ]
        );
        $product->reviews()->save($review);
        $review->product()->associate($product);
        $review->user()->associate($user);
        $review->save();
    }
}
