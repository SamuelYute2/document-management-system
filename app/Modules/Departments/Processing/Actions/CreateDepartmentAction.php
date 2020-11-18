<?php

namespace App\Modules\Departments\Processing\Actions;

use App\Modules\Departments\Data\Repositories\DepartmentRepository;
use Illuminate\Support\Facades\App;

/**
 * Class CreateDepartmentAction
 *
 * Action Creates a New Department from the Department name parameter.
 * The New Department has a random 8 Character Password and
 * is deactivated by Default.
 *
 * @package App\Modules\Departments\Processing\Actions
 */

class CreateDepartmentAction
{
    public function run($data)
    {
        return App::make(DepartmentRepository::class)->create($data);
    }
}
