
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>

<body>

    <h1>Welcome Admin!</h1>

    <h3>Name: {{ auth()->user()->name }}</h3>

    <h3>Email: {{ auth()->user()->email }}</h3>

    <h3>Admin Panel</h3>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
