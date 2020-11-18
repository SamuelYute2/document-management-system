<?php

namespace App\Modules\Employees\Processing\SubActions;

class ToggleEmployeeToStatusAction
{
    public function run($employee,$newStatus)
    {
        $employee->status = $newStatus;
        $employee->save();

        return $employee;
    }
}
