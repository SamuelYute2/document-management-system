<?php

namespace App\Modules\Users\Processing\Actions;

class DeleteUserAction
{
    public function run($user)
    {
        return $user->delete();
    }
}
