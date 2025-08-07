<!DOCTYPE html>
<html>
<head>
    <title>Ordered Items</title>
</head>
<body>
    <h1>Ordered Items for Order #{{ $order->id }}</h1>

    <p><strong>User:</strong> {{ $order->user->username }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    <a href="{{ route('orders.items.create', $order->id) }}">Add Item</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Ordered At</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($order->orderedItems as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->product->name ?? '-' }}</td>
                <td>{{ $item->ordered_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('orders.index') }}">← Back to Orders</a>
</body>
</html>
