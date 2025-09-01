<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethods = [
            [
                'name' => 'Tarjeta de crédito',
                'description' => 'Paga con tu tarjeta de crédito.',
                'img' => '/img/tarjeta.png'
            ],
            [
                'name' => 'Transferencia bancaria',
                'description' => 'Realiza una transferencia bancaria para pagar.',
                'img' => '/img/banco.png'
            ],
            [
                'name' => 'Bizum',
                'description' => 'Realiza pagos de forma más cómoda.',
                'img' => '/img/bizum.jpg'
            ],
        ];
        foreach ($paymentMethods as $paymentMethod) {
            PaymentMethod::create($paymentMethod);
        }
    }
}
