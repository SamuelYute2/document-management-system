<?php

namespace App\Modules\Employees;

use App\Modules\Employees\Data\Repositories\EmployeeRepository;
use App\Modules\Employees\Clients\API\Resources\EmployeeResource;
use Illuminate\Support\Facades\App;

class Employees {

    public static function repository()
    {
        return App::make(EmployeeRepository::class);
    }

    public static function resource($employee)
    {
      return new EmployeeResource($employee);
    }

    public static function resourceCollection($employees)
    {
      return EmployeeResource::collection($employees);
    }

}
