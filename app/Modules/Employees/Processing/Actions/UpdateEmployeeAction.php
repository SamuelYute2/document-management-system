<?php

namespace App\Modules\Employees\Processing\Actions;

class UpdateEmployeeAction
{
    public function run($data, $employee)
    {
        $employee->update($data);

        return $employee;
    }
}
