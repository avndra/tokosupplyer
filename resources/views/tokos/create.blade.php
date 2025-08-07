<!DOCTYPE html>
<html>
<head>
    <title>Create Your Toko</title>
</head>
<body>
    <h1>Create Your Toko</h1>

    <form method="POST" action="{{ route('tokos.store') }}">
        @csrf

        <label>Toko Name:</label><br>
        <input type="text" name="name_toko" required><br><br>

        <label>City:</label><br>
        <select name="city_code" required>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Create Toko</button>
    </form>
</body>
</html>
