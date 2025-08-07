<h1>Register</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>

    <label>Gender:</label><br>
    <select name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br><br>

    <button type="submit">Register</button>
</form>
