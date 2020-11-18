<?php

namespace App\Modules\Departments;

use App\Modules\Departments\Data\Repositories\DepartmentRepository;
use App\Modules\Departments\Clients\API\Resources\DepartmentResource;
use Illuminate\Support\Facades\App;

class Departments {

    public static function repository()
    {
        return App::make(DepartmentRepository::class);
    }

    public static function resource($department)
    {
      return new DepartmentResource($department);
    }

    public static function resourceCollection($departments)
    {
      return DepartmentResource::collection($departments);
    }

}
