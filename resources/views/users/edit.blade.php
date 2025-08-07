<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User: {{ $user->username }}</h1>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ $user->username }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $user->email }}" required><br><br>

        <label>Gender:</label><br>
        <select name="gender" required>
            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
        </select><br><br>

        <label>City:</label><br>
        <select name="city_code" required>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ $city->id == $user->city_code ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('users.index') }}">← Back to Users</a>
</body>
</html>
