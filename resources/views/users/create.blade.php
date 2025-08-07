<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create New User</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Gender:</label><br>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>

        <label>City:</label><br>
        <select name="city_code" required>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Create</button>
    </form>

    <br>
    <a href="{{ route('users.index') }}">← Back to Users</a>
</body>
</html>
