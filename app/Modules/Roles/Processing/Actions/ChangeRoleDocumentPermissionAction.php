<?php

namespace App\Modules\Roles\Processing\Actions;

use App\Modules\Roles\Data\Models\Role;
use App\Modules\Roles\Data\Repositories\RoleRepository;
use Illuminate\Support\Facades\App;

class ChangeRoleDocumentPermissionAction
{
    public function run($data, Role $role)
    {
        return App::make(RoleRepository::class)->updateDocumentPermission($data, $role);
    }
}
