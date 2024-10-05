<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    public function viewAny(Manager $manager)
    {
        return true;
    }

    public function view(Manager $manager, Employee $employee)
    {
        return $manager->id === $employee->manager_id;
    }

    public function create(Manager $manager)
    {
        return true;
    }

    public function update(Manager $manager, Employee $employee)
    {
        return $manager->id === $employee->manager_id;
    }

    public function delete(Manager $manager, Employee $employee)
    {
        return $manager->id === $employee->manager_id;
    }
}

