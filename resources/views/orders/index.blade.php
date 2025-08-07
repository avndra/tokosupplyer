<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
</head>
<body>
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}">Create New Order</a>

        @if ($orders->isEmpty())
            <p>You are not ordering yet.</p>
        @else

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}">Show</a> |
                    <a href="{{ route('orders.edit', $order->id) }}">Edit</a> |
                    <a href="{{ route('orders.items', $order->id) }}">Add Items</a> |
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this order?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
    <br>
    <a href="{{ route('dashboard') }}">← Back to Dashboard</a>
</body>
</html>
