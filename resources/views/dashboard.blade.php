
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>

<body>

    <h1>Welcome User!</h1>

    <h3>Name: {{ auth()->user()->name }}</h3>

    <h3>Email: {{ auth()->user()->email }}</h3>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
