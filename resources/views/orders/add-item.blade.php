<!DOCTYPE html>
<html>
<head>
    <title>Add Item to Order</title>
</head>
<body>
    <h1>Add Item to Order #{{ $orderId }}</h1>

    <form method="POST" action="{{ route('ordered-items.store') }}">
        @csrf

        <input type="hidden" name="order_id" value="{{ $orderId }}">

        <label>Select Product:</label><br>
        <select name="product_id" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->name }} (Stock: {{ $product->stock }})
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Add to Order</button>
    </form>

    <br>
    <a href="{{ route('orders.items', $orderId) }}">← Back to Ordered Items</a>
</body>
</html>
