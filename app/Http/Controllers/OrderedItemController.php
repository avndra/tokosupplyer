<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderedItem;
use Illuminate\Http\Request;

class OrderedItemController extends Controller
{
    public function index($orderId)
    {
        $order = Order::with('orderedItems.product')->findOrFail($orderId);
        if ($order->user_id !== request()->user()->id) {
            abort(403, 'Unauthorized');
        }

        return view('orders.items', compact('order'));
    }

    public function create($orderId)
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('orders.add-item', compact('products', 'orderId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
        ]);

        OrderedItem::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'ordered_at' => now(),
        ]);

        // Reduce product stock
        $product = Product::find($request->product_id);
        $product->decrement('stock');

        return redirect()->route('orders.items', $request->order_id);
    }
}
