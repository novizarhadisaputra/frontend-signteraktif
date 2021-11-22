<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    protected $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->paymentMethod->insert([
            [
                'name' => 'Bank Transfer'
            ],
            [
                'name' => 'Virtual Account'
            ],
            [
                'name' => 'Cash'
            ]
        ]);
    }
}
