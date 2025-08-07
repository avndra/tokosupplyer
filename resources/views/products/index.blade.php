<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>

    @if ($hasToko)
        <a href="{{ route('products.create') }}">Add New Product</a>
    @else
        <p><strong>You don't have a Toko.</strong> You can browse products, but you can't add your own.</p>
    @endif

    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>


    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Toko</th>
                <th>Price</th>
                <th>Status</th>
                <th>Supplier</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->toko->name_toko ?? '-' }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->supplier->name ?? '-' }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">Show</a>

                    @if (
                        request()->user()->role === 'admin' ||
                        request()->user()->id === ($product->toko->owner_id ?? null)
                    )
                        | <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        | <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('dashboard') }}">← Back to Dashboard</a>
</body>
</html>
