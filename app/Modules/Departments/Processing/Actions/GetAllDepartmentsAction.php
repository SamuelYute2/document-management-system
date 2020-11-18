<?php

namespace App\Modules\Departments\Processing\Actions;

use App\Modules\Departments\Data\Models\Department;

class GetAllDepartmentsAction
{
    public function run()
    {
        return Department::all();
    }
}
