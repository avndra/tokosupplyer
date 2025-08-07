<h1>Edit Supplier</h1>

<form method="POST" action="{{ route('suppliers.update', $supplier->id) }}">
    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ $supplier->name }}" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ $supplier->email }}" required><br><br>

    <label>Phone Number:</label><br>
    <input type="text" name="phone_number" value="{{ $supplier->phone_number }}" required><br><br>

    <label>Address:</label><br>
    <textarea name="address" required>{{ $supplier->address }}</textarea><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('suppliers.index') }}">← Back to Suppliers</a>
