<?php

namespace App\Modules\Roles\Processing\Actions;

class DeleteRoleAction
{
    public function run($role)
    {
        return $role->delete();
    }
}
