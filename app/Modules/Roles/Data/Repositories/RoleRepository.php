<?php

namespace App\Modules\Roles\Data\Repositories;

use App\Modules\Roles\Data\Models\Role;
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

    public function attachEmployees($data, Role $role)
    {
        return $role->employees()->syncWithoutDetaching($data['employees']);
    }

    public function detachEmployees($data, Role $role)
    {
        return $role->employees()->detach($data['employees']);
    }

    public function attachDocuments($data, Role $role)
    {
        return $role->documents()->syncWithoutDetaching($data['documents']);
    }

    public function detachDocuments($data, Role $role)
    {
        return $role->documents()->detach($data['documents']);
    }

    public function updateDocumentPermission($data, Role $role)
    {
        return $role->documents()->updateExistingPivot($data['document'], ['permission' => (string) $data['permission']]);
    }
}
