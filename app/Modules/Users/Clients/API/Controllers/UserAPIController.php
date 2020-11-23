<?php

namespace App\Modules\Users\Clients\API\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Employees\Employees;
use App\Modules\Users\Clients\API\Requests\ChangeUserPasswordRequest;
use App\Modules\Users\Clients\API\Requests\ResetUserPasswordRequest;
use App\Modules\Users\Clients\API\Requests\StoreUserRequest;
use App\Modules\Users\Clients\API\Requests\UpdateUserRequest;
use App\Modules\Users\Clients\API\Resources\UserResource;
use App\Modules\Users\Processing\Actions\ResetUserPasswordAction;
use Illuminate\Support\Facades\App;

use App\Modules\Users\Data\Models\User;

use App\Modules\Users\Processing\Actions\ChangeUserPasswordAction;
use App\Modules\Users\Processing\Actions\CreateUserAction;
use App\Modules\Users\Processing\Actions\DeleteUserAction;
use App\Modules\Users\Processing\Actions\GetAllUsersAction;
use App\Modules\Users\Processing\Actions\ToggleUserAction;
use App\Modules\Users\Processing\Actions\UpdateUserAction;


class UserAPIController extends  Controller
{
    public function getAll()
    {
        return UserResource::collection(App::make(GetAllUsersAction::class)->run());
    }

    public function get(User $user)
    {
        return new UserResource($user);
    }

    public function store(StoreUserRequest $request)
    {
        return new UserResource(App::make(CreateUserAction::class)->run($request->all()));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        return new UserResource(App::make(UpdateUserAction::class)->run($request->all(), $user));
    }

    public function delete(User $user)
    {
        App::make(DeleteUserAction::class)->run($user);

        return response('Success',204);
    }

    public function getEmployee(User $user)
    {
        return Employees::resource($user->employee);
    }

    public function toggle(User $user)
    {
        App::make(ToggleUserAction::class)->run($user);

        return response('Success',204);
    }

    public function changePassword(ChangeUserPasswordRequest $request, User $user)
    {
        App::make(ChangeUserPasswordAction::class)->run($user, $request->all());

        return response('Success',204);
    }

    public function resetPassword(ResetUserPasswordRequest $request, User $user)
    {
        App::make(ResetUserPasswordAction::class)->run($user);

        return response('Success',204);
    }

}
