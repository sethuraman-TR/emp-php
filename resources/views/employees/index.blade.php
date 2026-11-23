<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
</head>
<body>

    <h1>Employee Management System</h1>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('employees.create') }}">
        Add New Employee
    </a>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->salary }}</td>

                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}">
                            Edit
                        </a>

                        <form action="{{ route('employees.destroy', $employee->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Are you sure?')">
                                Delete
                            </button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No Employees Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>