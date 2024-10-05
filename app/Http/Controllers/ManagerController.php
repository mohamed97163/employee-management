<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class ManagerController extends Controller
{
    public function dashboard()
    {

        $employees = auth()->user()->employees;
        return view('manager.dashboard', compact('employees'));
    }
}
