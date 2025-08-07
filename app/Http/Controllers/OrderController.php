<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Order::where('user_id', request()->user()->id)
                    ->with('user')
                    ->get();

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = \App\Models\Order::with('user')->findOrFail($id);

        if ($order->user_id !== request()->user()->id) {
            abort(403, 'Unauthorized to view this order.');
        }

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $products = \App\Models\Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'products' => 'nullable|array',
        ]);

        $order = Order::create([
            'user_id' => $request->user()->id,
            'status' => $request->status,
        ]);

        // Handle selected products + quantities
        foreach ($request->products ?? [] as $productId => $data) {
            if (!isset($data['selected'])) continue;

            $product = \App\Models\Product::find($productId);

            $quantity = max(1, (int) $data['quantity']); // fallback to 1

            for ($i = 0; $i < $quantity; $i++) {
                \App\Models\OrderedItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'ordered_at' => now(),
                ]);
            }

            // Optional: Reduce product stock
            $product->decrement('stock', $quantity);
        }

        return redirect()->route('orders.index');
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();
        if ($order->user_id !== request()->user()->id) {
            abort(403, 'Unauthorized');
        }

        return view('orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        if ($order->user_id !== request()->user()->id) {
            abort(403, 'Unauthorized');
        }

        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if ($order->user_id !== request()->user()->id) {
            abort(403, 'Unauthorized');
        }
        $order->delete();
        return redirect()->route('orders.index');
    }
}

