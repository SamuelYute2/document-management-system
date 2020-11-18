<?php

namespace App\Modules\Departments\Processing\Actions;

use App\Modules\Departments\Data\Models\Department;

class DeleteDepartmentAction
{
    public function run(Department $department)
    {
        return $department->delete();
    }
}
