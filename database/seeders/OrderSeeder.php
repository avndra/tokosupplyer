<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderedItem;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $order = Order::create([
            'user_id' => 2, // johndoe
            'status' => 'pending',
            'created_at' => now(),
        ]);

        OrderedItem::create([
            'order_id' => $order->id,
            'product_id' => 1,
            'ordered_at' => now(),
            'created_at' => now(),
        ]);

        OrderedItem::create([
            'order_id' => $order->id,
            'product_id' => 3,
            'ordered_at' => now(),
            'created_at' => now(),
        ]);
    }
}
