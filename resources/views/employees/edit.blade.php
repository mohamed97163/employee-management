<!-- resources/views/employees/edit.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Edit Employee</h1>
<form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}" required>
    </div>
    <div class="mb-3">
        <label for="picture" class="form-label">Picture</label>
        <input type="file" class="form-control" id="picture" name="picture">
        @if($employee->picture)
            <img src="{{ asset('storage/' . $employee->picture) }}" alt="{{ $employee->name }}" width="100" class="mt-2">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update Employee</button>
</form>
@endsection