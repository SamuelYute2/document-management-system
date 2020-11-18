<?php

namespace App\Modules\Users;

use App\Modules\Users\Data\Repositories\UserRepository;
use App\Modules\Users\Clients\API\Resources\UserResource;
use Illuminate\Support\Facades\App;

class Users {

    public static function repository()
    {
        return App::make(UserRepository::class);
    }

    public static function resource($user)
    {
      return new UserResource($user);
    }

    public static function resourceCollection($users)
    {
      return UserResource::collection($users);
    }

}
