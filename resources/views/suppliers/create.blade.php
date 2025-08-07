<h1>Create Supplier</h1>

<form method="POST" action="{{ route('suppliers.store') }}">
    @csrf
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone Number:</label><br>
    <input type="text" name="phone_number" required><br><br>

    <label>Address:</label><br>
    <textarea name="address" required></textarea><br><br>

    <button type="submit">Create</button>
</form>

<a href="{{ route('suppliers.index') }}">← Back to Suppliers</a>
