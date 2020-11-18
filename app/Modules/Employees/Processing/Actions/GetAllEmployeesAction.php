<?php

namespace App\Modules\Employees\Processing\Actions;

use App\Modules\Employees\Data\Models\Employee;

class GetAllEmployeesAction
{
    public function run()
    {
        return Employee::all();
    }
}
