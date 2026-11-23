 
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

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
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }

        a { color: #2563eb; }
        .error { color: red; }
    </style>
</head>

<body>

<div class="container">

    <h2>User Register</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <input type="text" name="name"
            placeholder="Enter Name"
            value="{{ old('name') }}" required>

        <input type="email" name="email"
            placeholder="Enter Email"
            value="{{ old('email') }}" required>

        <input type="password" name="password"
            placeholder="Enter Password" required>

        <input type="password" name="password_confirmation"
            placeholder="Confirm Password" required>

        <button type="submit">Register</button>

    </form>

    <p>Already have an account?
        <a href="{{ route('login') }}">Login</a>
    </p>

</div>

</body>
</html>
