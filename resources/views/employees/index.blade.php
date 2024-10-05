<!-- resources/views/employees/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Employees</h1>
<a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add New Employee</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Picture</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td>
                @if($employee->picture)
                    <img src="{{ asset('storage/' . $employee->picture) }}" alt="{{ $employee->name }}" width="50">
                @else
                    No Picture
                @endif
            </td>
            <td>
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
