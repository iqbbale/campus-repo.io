<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Form Login</h1>

    @if(session('error'))
        <p style="color: red;">
            {{ session('error') }}
        </p>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div>
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <br>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <br>

        <button type="submit">Login</button>
    </form>

</body>
</html>
