<?php

namespace App\Modules\Roles;

use App\Modules\Roles\Data\Repositories\RoleRepository;
use App\Modules\Roles\Clients\API\Resources\RoleResource;
use Illuminate\Support\Facades\App;

class Roles {

    public static function repository()
    {
        return App::make(RoleRepository::class);
    }

    public static function resource($role)
    {
      return new RoleResource($role);
    }

    public static function resourceCollection($roles)
    {
      return RoleResource::collection($roles);
    }

}
