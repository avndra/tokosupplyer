<!DOCTYPE html>
<html>
<head>
    <title>Order Detail</title>
</head>
<body>
    <h1>Order #{{ $order->id }}</h1>

    <p><strong>User:</strong> {{ $order->user->username ?? '-' }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    <a href="{{ route('orders.items', $order->id) }}">View Ordered Items</a><br><br>
    <a href="{{ route('orders.index') }}">← Back to Orders</a>
</body>
</html>
