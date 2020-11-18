<?php

namespace App\Modules\Users\Processing\Actions;

class UpdateUserAction
{
    public function run($data, $user)
    {
        $user->update($data);

        return $user;
    }
}
