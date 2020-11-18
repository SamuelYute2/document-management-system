<?php

namespace App\Modules\Users\Processing\Actions;

use App\Modules\Users\Data\Repositories\UserRepository;
use App\Modules\Users\Processing\Tasks\AssignUserRandomPasswordTask;
use App\Modules\Users\Processing\Tasks\GenerateRandomUserPasswordTask;
use Illuminate\Support\Facades\App;

class ResetUserPasswordAction
{
    public function run($user)
    {
        $userRepository = App::make(UserRepository::class);

        $userRepository->assignPassword($user, App::make(GenerateRandomUserPasswordTask::class)->run());

        return $userRepository->update([],$user);
    }
}
