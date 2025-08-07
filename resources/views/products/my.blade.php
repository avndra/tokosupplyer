<!DOCTYPE html>
<html>
<head>
    <title>My Products</title>
</head>
<body>
    <h1>My Products</h1>

    <a href="{{ route('products.index') }}">View All Products</a> |
    <a href="{{ route('products.create') }}">Add New Product</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Toko</th>
                <th>Status</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->toko->name_toko ?? '-' }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">Show</a> |
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a> |
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
