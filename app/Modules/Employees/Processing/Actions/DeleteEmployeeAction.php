<?php

namespace App\Modules\Employees\Processing\Actions;

class DeleteEmployeeAction
{
    public function run($employee)
    {
        return $employee->delete();
    }
}
