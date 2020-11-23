<?php

namespace App\Modules\Roles\Clients\API\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Documents\Documents;
use App\Modules\Employees\Employees;
use App\Modules\Roles\Clients\API\Requests\AttachRoleDocumentsRequest;
use App\Modules\Roles\Clients\API\Requests\AttachRoleEmployeesRequest;
use App\Modules\Roles\Clients\API\Requests\ChangeRoleDocumentPermissionRequest;
use App\Modules\Roles\Clients\API\Requests\DetachRoleDocumentsRequest;
use App\Modules\Roles\Clients\API\Requests\DetachRoleEmployeesRequest;
use App\Modules\Roles\Clients\API\Requests\StoreRoleRequest;
use App\Modules\Roles\Clients\API\Requests\UpdateRoleRequest;
use App\Modules\Roles\Clients\API\Resources\RoleResource;
use App\Modules\Roles\Processing\Actions\AttachRoleDocumentsAction;
use App\Modules\Roles\Processing\Actions\AttachRoleEmployeesAction;
use App\Modules\Roles\Processing\Actions\ChangeRoleDocumentPermissionAction;
use App\Modules\Roles\Processing\Actions\DetachRoleDocumentsAction;
use App\Modules\Roles\Processing\Actions\DetachRoleEmployeesAction;
use Illuminate\Support\Facades\App;

use App\Modules\Roles\Data\Models\Role;

use App\Modules\Roles\Processing\Actions\CreateRoleAction;
use App\Modules\Roles\Processing\Actions\DeleteRoleAction;
use App\Modules\Roles\Processing\Actions\GetAllRolesAction;
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

    public function getEmployees(Role $role)
    {
        return Employees::resourceCollection($role->employees);
    }

    public function attachEmployees(AttachRoleEmployeesRequest $request, Role $role)
    {
        App::make(AttachRoleEmployeesAction::class)->run($request->all(), $role);

        return response('Success',200);
    }

    public function detachEmployees(DetachRoleEmployeesRequest $request, Role $role)
    {
        App::make(DetachRoleEmployeesAction::class)->run($request->all(), $role);

        return response('Success',200);
    }

    public function getDocuments(Role $role)
    {
        return Documents::resourceCollection($role->documents);
    }

    public function attachDocuments(AttachRoleDocumentsRequest $request, Role $role)
    {
        App::make(AttachRoleDocumentsAction::class)->run($request->all(), $role);

        return response('Success',200);
    }

    public function detachDocuments(DetachRoleDocumentsRequest $request, Role $role)
    {
        App::make(DetachRoleDocumentsAction::class)->run($request->all(), $role);

        return response('Success',200);
    }

    public function changeDocumentPermission(ChangeRoleDocumentPermissionRequest $request, Role $role)
    {
        App::make(ChangeRoleDocumentPermissionAction::class)->run($request->all(), $role);

        return response('Success',200);
    }

}
