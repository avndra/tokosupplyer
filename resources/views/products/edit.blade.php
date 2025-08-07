<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product: {{ $product->name }}</h1>

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ $product->name }}" required><br><br>

        <label>Toko:</label><br>
        <select name="toko_id" required>
            @foreach ($tokos as $toko)
                <option value="{{ $toko->id }}" {{ $product->toko_id == $toko->id ? 'selected' : '' }}>
                    {{ $toko->name_toko }}
                </option>
            @endforeach
        </select><br><br>

        <label>Price:</label><br>
        <input type="number" name="price" value="{{ $product->price }}" required><br><br>

        <label>Status:</label><br>
        <input type="text" name="status" value="{{ $product->status }}" required><br><br>

        <label>Supplier:</label><br>
        <select name="supplier_id" required>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select><br><br>

        <label>Stock:</label><br>
        <input type="number" name="stock" value="{{ $product->stock }}" required><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">← Back to Products</a>
</body>
</html>
