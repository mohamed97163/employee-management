<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = auth()->user()->employees;
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('employee_pictures', 'public');
            $validated['picture'] = $path;
        }

        $validated['manager_id'] = auth()->id();

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    public function edit(Employee $employee)
    {
        $this->authorize('update', $employee);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $this->authorize('update', $employee);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            if ($employee->picture) {
                Storage::disk('public')->delete($employee->picture);
            }
            $path = $request->file('picture')->store('employee_pictures', 'public');
            $validated['picture'] = $path;
        }

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);

        if ($employee->picture) {
            Storage::disk('public')->delete($employee->picture);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}