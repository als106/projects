<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $user = new User
        (
            [
                'name' => 'Carlos Sempere Martínez',
                'email' => 'carlossemperemartinez@gmail.com',
                'password' => 'ahbsdbha123'
            ]
        );
        $user->save();

        $user = new User
        (
            [
                'name' => 'Juan Antonio Sánchez García',
                'email' => 'jantoniosanchezgarcia@gmail.com',
                'password' => 'asdasfb21654'
            ]
        );
        $user->save();

        $user = new User
        (
            [
                'name' => 'Laura Díaz Herrero',
                'email' => 'lauradiazherrero@gmail.com',
                'password' => '8454RGasjnasj'
            ]
        );
        $user->save();

        $user = new User
        (
            [
                'name' => 'Susana García Abad',
                'email' => 'susanagarciaabad@gmail.com',
                'password' => 'jnvjbao4848'
            ]
        );
        $user->save();

        $user = new User
        (
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'administrador',
                'role' => 'admin'
            ]
        );
        $user->save();
    }
}
