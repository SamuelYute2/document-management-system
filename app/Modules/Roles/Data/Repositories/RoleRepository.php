<?php

namespace App\Modules\Roles\Data\Repositories;

use App\Modules\Roles\Data\Models\Role;
use App\Modules\Roles\Processing\Tasks\AssignRoleRandomPasswordTask;
use Carbon\Carbon;

class RoleRepository {

    public function getAll()
    {
        return Role::all();
    }

    public function get($id)
    {
        return Role::find($id);
    }

    public function create($data)
    {
        $role = new Role;
        $role->fill($data);

        $role->save();

        return $role;
    }

    public function update($data, Role $role)
    {
        $role->update($data);

        return $role;
    }

    public function delete(Role $role)
    {
        return $role->delete();
    }


}
