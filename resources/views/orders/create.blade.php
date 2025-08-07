<!DOCTYPE html>
<html>
<head>
    <title>Create New Order</title>
</head>
<body>
    <h1>Create New Order</h1>

<form method="POST" action="{{ route('orders.store') }}">
    @csrf

    <label>Status:</label><br>
    <input type="text" name="status" required><br><br>

    <label>Select Products and Quantity:</label><br>
    @foreach ($products as $product)
        <input type="checkbox" name="products[{{ $product->id }}][selected]" value="1">
        {{ $product->name }} (Stock: {{ $product->stock }})<br>
        Quantity: <input type="number" name="products[{{ $product->id }}][quantity]" min="1" max="{{ $product->stock }}" value="1"><br><br>
    @endforeach

    <button type="submit">Create Order</button>
</form>

<br>
<a href="{{ route('orders.index') }}">← Back to Orders</a>
</body>
</html>
