<?php

namespace App\Modules\Departments\Clients\API\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Departments\Clients\API\Requests\StoreDepartmentRequest;
use App\Modules\Departments\Clients\API\Requests\UpdateDepartmentRequest;
use App\Modules\Departments\Clients\API\Resources\DepartmentResource;
use App\Modules\Documents\Documents;
use App\Modules\Employees\Clients\API\Resources\EmployeeResource;
use App\Modules\Employees\Employees;
use App\Modules\Users\Users;
use Illuminate\Support\Facades\App;

use App\Modules\Departments\Data\Models\Department;

use App\Modules\Departments\Processing\Actions\CreateDepartmentAction;
use App\Modules\Departments\Processing\Actions\DeleteDepartmentAction;
use App\Modules\Departments\Processing\Actions\GetAllDepartmentsAction;
use App\Modules\Departments\Processing\Actions\UpdateDepartmentAction;


class DepartmentAPIController extends  Controller
{
    public function getAll()
    {
        return DepartmentResource::collection(App::make(GetAllDepartmentsAction::class)->run());
    }

    public function get(Department $department)
    {
        return new DepartmentResource($department);
    }

    public function store(StoreDepartmentRequest $request)
    {
        return new DepartmentResource(App::make(CreateDepartmentAction::class)->run($request->all()));
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        return new DepartmentResource(App::make(UpdateDepartmentAction::class)->run($request->all(), $department));
    }

    public function delete(Department $department)
    {
        App::make(DeleteDepartmentAction::class)->run($department);

        return response('Success',204);
    }

    public function getEmployees(Department $department)
    {
        return Employees::resourceCollection($department->employees);
    }

    public function getDocuments(Department $department)
    {
        return Documents::resourceCollection($department->documents);
    }
}
