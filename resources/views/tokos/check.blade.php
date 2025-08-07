<!DOCTYPE html>
<html>
<head>
    <title>Do you want to create a Toko?</title>
</head>
<body>
    <h1>Do you want to create your own Toko?</h1>

    <form action="{{ route('tokos.create') }}" method="GET" style="display:inline;">
        <button type="submit">Yes, Create Toko</button>
    </form>

    <form action="/products" method="GET" style="display:inline;">
        <button type="submit">No, Just Browse Products</button>
    </form>
</body>
</html>
