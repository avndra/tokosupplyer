<!DOCTYPE html>
<html>
<head>
    <title>User Detail</title>
</head>
<body>
    <h1>User Detail: {{ $user->username }}</h1>

    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Gender:</strong> {{ $user->gender }}</p>
    <p><strong>City:</strong> {{ $user->city->name ?? '-' }}</p>
    <br>

    <a href="{{ route('users.index') }}">← Back to User List</a>
</body>
</html>
