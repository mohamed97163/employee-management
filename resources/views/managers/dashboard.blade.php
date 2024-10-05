<!-- resources/views/manager/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Manager Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <a href="{{ route('employees.index') }}" class="btn btn-primary">Manage Employees</a>
@endsection