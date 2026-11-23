<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>

    <h1>Edit Employee Details</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('employees.update', $employee->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name"
               value="{{ old('name', $employee->name) }}">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email"
               value="{{ old('email', $employee->email) }}">
        <br><br>

        <label>Department:</label>
        <input type="text" name="department"
               value="{{ old('department', $employee->department) }}">
        <br><br>

        <label>Salary:</label>
        <input type="number" name="salary" step="0.01"
               value="{{ old('salary', $employee->salary) }}">
        <br><br>

        <button type="submit">Update Employee</button>

    </form>

    <br>

    <a href="{{ route('employees.index') }}">Back</a>

</body>
</html>