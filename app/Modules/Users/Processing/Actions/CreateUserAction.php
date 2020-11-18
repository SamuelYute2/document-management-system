<?php

namespace App\Modules\Users\Processing\Actions;

use App\Modules\Users\Data\Repositories\UserRepository;
use App\Modules\Users\Processing\Tasks\GenerateRandomUserPasswordTask;
use Illuminate\Support\Facades\App;

/**
 * Class CreateUserAction
 *
 * Action Creates a New User from the Username parameter.
 * The New User has a random 8 Character Password and
 * is deactivated by Default.
 *
 * @package App\Modules\Users\Processing\Actions
 */

class CreateUserAction
{
    public function run($data, $userable)
    {
        $data = array_add($data,'password',App::make(GenerateRandomUserPasswordTask::class)->run());

        return App::make(UserRepository::class)->create($data, $userable);
    }
}
