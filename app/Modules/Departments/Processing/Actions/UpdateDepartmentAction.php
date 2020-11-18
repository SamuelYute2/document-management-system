<?php

namespace App\Modules\Departments\Processing\Actions;

use App\Modules\Departments\Data\Models\Department;

class UpdateDepartmentAction
{
    public function run($data, Department $department)
    {
        $department->update($data);

        return $department;
    }
}
