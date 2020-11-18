<?php

namespace App\Modules\Roles\Clients\API\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Roles\Clients\API\Requests\ChangeRolePasswordRequest;
use App\Modules\Roles\Clients\API\Requests\ResetRolePasswordRequest;
use App\Modules\Roles\Clients\API\Requests\StoreRoleRequest;
use App\Modules\Roles\Clients\API\Requests\UpdateRoleRequest;
use App\Modules\Roles\Clients\API\Resources\RoleResource;
use App\Modules\Roles\Processing\Actions\ResetRolePasswordAction;
use Illuminate\Support\Facades\App;

use App\Modules\Roles\Data\Models\Role;

use App\Modules\Roles\Processing\Actions\ChangeRolePasswordAction;
use App\Modules\Roles\Processing\Actions\CreateRoleAction;
use App\Modules\Roles\Processing\Actions\DeleteRoleAction;
use App\Modules\Roles\Processing\Actions\GetAllRolesAction;
use App\Modules\Roles\Processing\Actions\ToggleRoleAction;
use App\Modules\Roles\Processing\Actions\UpdateRoleAction;


class RoleAPIController extends  Controller
{
    public function getAll()
    {
        return RoleResource::collection(App::make(GetAllRolesAction::class)->run());
    }

    public function get(Role $role)
    {
        return new RoleResource($role);
    }

    public function store(StoreRoleRequest $request)
    {
        return new RoleResource(App::make(CreateRoleAction::class)->run($request->all()));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        return new RoleResource(App::make(UpdateRoleAction::class)->run($request->all(), $role));
    }

    public function delete(Role $role)
    {
        App::make(DeleteRoleAction::class)->run($role);

        return response('Success',204);
    }

    public function toggle(Role $role)
    {
        App::make(ToggleRoleAction::class)->run($role);

        return response('Success',204);
    }

    public function changePassword(ChangeRolePasswordRequest $request, Role $role)
    {
        App::make(ChangeRolePasswordAction::class)->run($role, $request->all());

        return response('Success',204);
    }

    public function resetPassword(ResetRolePasswordRequest $request, Role $role)
    {
        App::make(ResetRolePasswordAction::class)->run($role);

        return response('Success',204);
    }

}
