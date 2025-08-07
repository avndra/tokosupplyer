<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Mini Store Dashboard</h1>
    <ul>
        <li><a href="{{ route('users.index') }}">Manage Users</a></li>
        <li><a href="{{ route('products.index') }}">Manage Products</a></li>
        <li><a href="{{ route('orders.index') }}">Manage Orders</a></li>
        <li><a href="{{ route('tokos.index') }}">Manage Tokos</a></li>
        <li><a href="{{ route('suppliers.index') }}">Manage Suppliers</a></li>
    </ul>
</body>
</html>
