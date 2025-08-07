<!DOCTYPE html>
<html>
<head>
    <title>Manage Tokos</title>
</head>
<body>
    <h1>Tokos</h1>
    <a href="{{ route('tokos.create') }}">Add New Toko</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Owner</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tokos as $toko)
            <tr>
                <td>{{ $toko->name_toko }}</td>
                <td>{{ $toko->owner->username ?? '-' }}</td>
                <td>{{ $toko->city->name ?? '-' }}</td>
                <td>
                    @if (request()->user()->id === $toko->owner_id || request()->user()->role === 'admin')
                        <a href="{{ route('tokos.edit', $toko->id) }}">Edit</a> |
                    @endif |
                    <form action="{{ route('tokos.destroy', $toko->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this toko?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('dashboard') }}">← Back to Dashboard</a>
</body>
</html>
