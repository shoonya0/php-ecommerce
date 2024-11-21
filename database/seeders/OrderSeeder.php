<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $orders = [
            [
                'customer_name' => 'John Doe',
                'total' => 299.99,
                'status' => 'pending',
            ],
            [
                'customer_name' => 'Jane Smith',
                'total' => 159.50,
                'status' => 'completed',
            ],
            [
                'customer_name' => 'Bob Johnson',
                'total' => 499.99,
                'status' => 'processing',
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
