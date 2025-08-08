<!DOCTYPE html>
<html>
<head>
    <title>Suppliers</title>
</head>
<body>
    <h1>Suppliers</h1>
    @if (Auth::user()->role === 'admin')
        <a href="{{ route('suppliers.create') }}">Add New Supplier</a>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->phone_number }}</td>
                <td>{{ $supplier->address }}</td>
                <td>
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('suppliers.edit', $supplier->id) }}">Edit</a> |
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this supplier?')">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <br>
    <a href="{{ route('dashboard') }}">← Back to Dashboard</a>
</body>
</html>
