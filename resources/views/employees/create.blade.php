<!-- resources/views/employees/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Add New Employee</h1>
<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="picture" class="form-label">Picture</label>
        <input type="file" class="form-control" id="picture" name="picture">
    </div>
    <button type="submit" class="btn btn-primary">Add Employee</button>
</form>
@endsection
