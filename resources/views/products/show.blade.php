<!DOCTYPE html>
<html>
<head>
    <title>Product Detail</title>
</head>
<body>
    <h1>Product Detail: {{ $product->name }}</h1>

    <p><strong>Toko:</strong> {{ $product->toko->name_toko ?? '-' }}</p>
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Status:</strong> {{ $product->status }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>

    <h3>Supplier Info</h3>
    <p><strong>Name:</strong> {{ $product->supplier->name ?? '-' }}</p>
    <p><strong>Email:</strong> {{ $product->supplier->email ?? '-' }}</p>
    <p><strong>Phone:</strong> {{ $product->supplier->phone_number ?? '-' }}</p>

    <br>
    <a href="{{ route('products.index') }}">← Back to Products</a>
</body>
</html>
