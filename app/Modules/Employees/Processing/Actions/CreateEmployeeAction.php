<?php

namespace App\Modules\Employees\Processing\Actions;

use App\Modules\Employees\Data\Repositories\EmployeeRepository;
use App\Modules\Employees\Processing\Tasks\GenerateRandomEmployeePasswordTask;
use Illuminate\Support\Facades\App;

/**
 * Class CreateEmployeeAction
 *
 * Action Creates a New Employee from the Employeename parameter.
 * The New Employee has a random 8 Character Password and
 * is deactivated by Default.
 *
 * @package App\Modules\Employees\Processing\Actions
 */

class CreateEmployeeAction
{
    public function run($data, $employeeable)
    {
        $data = array_add($data,'password',App::make(GenerateRandomEmployeePasswordTask::class)->run());

        return App::make(EmployeeRepository::class)->create($data, $employeeable);
    }
}
