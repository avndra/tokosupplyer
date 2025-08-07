<!DOCTYPE html>
<html>
<head>
    <title>Edit Toko</title>
</head>
<body>
    <h1>Edit Toko: {{ $toko->name_toko }}</h1>

    <form method="POST" action="{{ route('tokos.update', $toko->id) }}">
        @csrf
        @method('PUT')

        <label>Toko Name:</label><br>
        <input type="text" name="name_toko" value="{{ $toko->name_toko }}" required><br><br>

        <label>City:</label><br>
        <select name="city_code" required>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ $toko->city_code == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('tokos.index') }}">← Back to Tokos</a>
</body>
</html>
