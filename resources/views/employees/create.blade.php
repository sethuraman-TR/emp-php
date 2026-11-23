<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

    <h1>Add New Employee</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('employees.store') }}" method="POST">

        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br><br>

        <label>Department:</label>
        <input type="text" name="department"
               value="{{ old('department') }}">
        <br><br>

        <label>Salary:</label>
        <input type="number" name="salary" step="0.01"
               value="{{ old('salary') }}">
        <br><br>

        <button type="submit">Save Employee</button>

    </form>

    <br>

    <a href="{{ route('employees.index') }}">Back to Employee List</a>

</body>
</html>