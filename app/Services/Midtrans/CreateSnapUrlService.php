<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapUrlService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapUrl()
    {
        $params = [
            /**
             * 'order_id' => id order unik yang akan digunakan sebagai "primary key" oleh Midtrans untuk
             * 				 membedakan order satu dengan order lain. Key ini harus unik (tidak boleh ada duplikat).
             * 'gross_amount' => merupakan total harga yang harus dibayar customer.
             */
            'transaction_details' => [
                'order_id' => $this->order->id,
                'gross_amount' => $this->order->gross_amount,
            ],
            /**
             * 'item_details' bisa diisi dengan detail item dalam order.
             * Umumnya, data ini diambil dari tabel `order_items`.
             */
            // [
                // [
                //     'id' => 1, // primary key produk
                //     'price' => '150000', // harga satuan produk
                //     'quantity' => 1, // kuantitas pembelian
                //     'name' => 'Flashdisk Toshiba 32GB', // nama produk
                // ],
            //     [
            //         'id' => 2,
            //         'price' => '60000',
            //         'quantity' => 2,
            //         'name' => 'Memory Card VGEN 4GB',
            //     ],
            // ]
            'item_details' => $this->order->details,
            'customer_details' => $this->order->customer_details
        ];

        $snapToken = Snap::getSnapUrl($params);

        return $snapToken;
    }
}
