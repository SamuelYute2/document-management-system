<?php

namespace App\Modules\Employees\Clients\API\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Departments\Departments;
use App\Modules\Employees\Clients\API\Requests\StoreEmployeeRequest;
use App\Modules\Employees\Clients\API\Requests\UpdateEmployeeRequest;
use App\Modules\Employees\Clients\API\Resources\EmployeeResource;
use App\Modules\Users\Users;
use Illuminate\Support\Facades\App;

use App\Modules\Employees\Data\Models\Employee;

use App\Modules\Employees\Processing\Actions\CreateEmployeeAction;
use App\Modules\Employees\Processing\Actions\DeleteEmployeeAction;
use App\Modules\Employees\Processing\Actions\GetAllEmployeesAction;
use App\Modules\Employees\Processing\Actions\UpdateEmployeeAction;


class EmployeeAPIController extends  Controller
{
    public function getAll()
    {
        return EmployeeResource::collection(App::make(GetAllEmployeesAction::class)->run());
    }

    public function get(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    public function store(StoreEmployeeRequest $request)
    {
        return new EmployeeResource(App::make(CreateEmployeeAction::class)->run($request->all()));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        return new EmployeeResource(App::make(UpdateEmployeeAction::class)->run($request->all(), $employee));
    }

    public function delete(Employee $employee)
    {
        App::make(DeleteEmployeeAction::class)->run($employee);

        return response()->json('Success',204);
    }

    public function getUser(Employee $employee)
    {
        if ($employee->user)
            return Users::resource($employee->user);
        else
            abort(404,'User not found');
    }

    public function getDepartment(Employee $employee)
    {
        return Departments::resource($employee->department);
    }
}
