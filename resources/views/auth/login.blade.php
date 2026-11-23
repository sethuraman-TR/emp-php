   
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        body {
            font-family: Arial;
            background: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 4px 15px #ccc;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #16a34a;
            color: white;
            border: none;
            cursor: pointer;
        }

        a { color: #2563eb; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>

<body>

<div class="container">

    <h2>User Login</h2>

    @if ($errors->any())
        <p class="error">{{ $errors->first() }}</p>
    @endif

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <input type="email" name="email"
            placeholder="Enter Email"
            value="{{ old('email') }}" required>

        <input type="password" name="password"
            placeholder="Enter Password" required>

        <button type="submit">Login</button>

    </form>

    <p>Don't have an account?
        <a href="{{ route('register') }}">Register</a>
    </p>

</div>

</body>
</html>
