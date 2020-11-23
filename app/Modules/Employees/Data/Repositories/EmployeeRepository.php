<?php

namespace App\Modules\Employees\Data\Repositories;

use App\Modules\Departments\Data\Models\Department;
use App\Modules\Employees\Data\Models\Employee;

class EmployeeRepository {

    public function getAll()
    {
        return Employee::all();
    }

    public function get($id)
    {
        return Employee::find($id);
    }

    public function getBy($field, $value)
    {
        return Employee::where($field, $value)->first();
    }

    public function create($data, Department $department)
    {
        $employee = new Employee;
        $employee->fill($data);

        $employee->department()->associate($department);
        $employee->save();

        return $employee;
    }

    public function update($data, Employee $employee)
    {
        $employee->update($data);

        return $employee;
    }

    public function delete(Employee $employee)
    {
        return $employee->delete();
    }
}
