<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    protected $transactionStatus;

    public function __construct(TransactionStatus $transactionStatus)
    {
        $this->transactionStatus = $transactionStatus;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->transactionStatus->insert([
            [
                'name' => 'Waiting Payment',
                'slug' => 'waiting-payment',
                'is_active' => 1
            ],
            [
                'name' => 'Paid',
                'slug' => 'paid',
                'is_active' => 1
            ],
            [
                'name' => 'Ongoing',
                'slug' => 'ongoing',
                'is_active' => 1
            ],
            [
                'name' => 'Finish',
                'slug' => 'finish',
                'is_active' => 1
            ],
            [
                'name' => 'Canceled',
                'slug' => 'canceled',
                'is_active' => 1
            ]
        ]);
    }
}
