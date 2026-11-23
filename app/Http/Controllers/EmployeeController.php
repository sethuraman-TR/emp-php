<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   // READ: Display all employees
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    // CREATE: Show employee form
    public function create()
    {
        return view('employees.create');
    }

    // STORE: Insert employee into database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'department' => 'required',
            'salary' => 'required|numeric|min:0'
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'salary' => $request->salary
        ]);

        return redirect()->route('employees.index')
                         ->with('success', 'Employee added successfully!');
    }

    // EDIT: Show existing employee details
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    // UPDATE: Update employee details
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
            'department' => 'required',
            'salary' => 'required|numeric|min:0'
        ]);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'salary' => $request->salary
        ]);

        return redirect()->route('employees.index')
                         ->with('success', 'Employee updated successfully!');
    }

    // DELETE: Remove employee from database
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->route('employees.index')
                         ->with('success', 'Employee deleted successfully!');
    }
}
