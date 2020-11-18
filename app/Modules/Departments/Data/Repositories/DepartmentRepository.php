<?php

namespace App\Modules\Departments\Data\Repositories;

use App\Modules\Departments\Data\Models\Department;

class DepartmentRepository {

    public function getAll()
    {
        return Department::all();
    }

    public function get($id)
    {
        return Department::find($id);
    }

    public function getBy($field, $value)
    {
        return Department::where($field, $value)->first();
    }

    public function create($data)
    {
        $department = new Department;
        $department->fill($data);

        $department->save();

        return $department;
    }

    public function update($data, Department $department)
    {
        $department->update($data);

        return $department;
    }

    public function delete(Department $department)
    {
        return $department->delete();
    }
}
