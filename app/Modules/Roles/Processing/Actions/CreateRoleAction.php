<?php

namespace App\Modules\Roles\Processing\Actions;

use App\Modules\Roles\Data\Repositories\RoleRepository;
use App\Modules\Roles\Processing\Tasks\GenerateRandomRolePasswordTask;
use Illuminate\Support\Facades\App;

/**
 * Class CreateRoleAction
 *
 * Action Creates a New Role from the Rolename parameter.
 * The New Role has a random 8 Character Password and
 * is deactivated by Default.
 *
 * @package App\Modules\Roles\Processing\Actions
 */

class CreateRoleAction
{
    public function run($data, $roleable)
    {
        $data = array_add($data,'password',App::make(GenerateRandomRolePasswordTask::class)->run());

        return App::make(RoleRepository::class)->create($data, $roleable);
    }
}
