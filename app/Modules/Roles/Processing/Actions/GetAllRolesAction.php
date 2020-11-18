<?php

namespace App\Modules\Roles\Processing\Actions;

use App\Modules\Roles\Data\Models\Role;

class GetAllRolesAction
{
    public function run()
    {
        return Role::all();
    }
}
