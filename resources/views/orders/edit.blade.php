<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order #{{ $order->id }}</h1>

    <form method="POST" action="{{ route('orders.update', $order->id) }}">
        @csrf
        @method('PUT')

        <label>User:</label><br>
        <select name="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $order->user_id ? 'selected' : '' }}>
                    {{ $user->username }}
                </option>
            @endforeach
        </select><br><br>

        <label>Status:</label><br>
        <input type="text" name="status" value="{{ $order->status }}" required><br><br>

        <button type="submit">Update Order</button>
    </form>

    <br>
    <a href="{{ route('orders.index') }}">← Back to Orders</a>
</body>
</html>
