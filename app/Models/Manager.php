<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manager extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function redirectTo()
    {
        return route('manager.employees');
    }
}
