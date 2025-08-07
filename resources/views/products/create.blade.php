<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Create New Product</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Toko:</label><br>
        <select name="toko_id" required>
            @foreach ($tokos as $toko)
                <option value="{{ $toko->id }}">{{ $toko->name_toko }}</option>
            @endforeach
        </select><br><br>

        <label>Price:</label><br>
        <input type="number" name="price" required><br><br>

        <label>Status:</label><br>
        <input type="text" name="status" required><br><br>

        <label>Supplier:</label><br>
        <select name="supplier_id" required>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select><br><br>

        <label>Stock:</label><br>
        <input type="number" name="stock" required><br><br>

        <button type="submit">Create</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">← Back to Products</a>
</body>
</html>
