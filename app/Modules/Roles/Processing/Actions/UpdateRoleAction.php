<?php

namespace App\Modules\Roles\Processing\Actions;

class UpdateRoleAction
{
    public function run($data, $role)
    {
        $role->update($data);

        return $role;
    }
}
