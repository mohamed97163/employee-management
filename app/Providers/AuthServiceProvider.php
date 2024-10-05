<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Employee;
use App\Policies\EmployeePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Employee::class => EmployeePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
