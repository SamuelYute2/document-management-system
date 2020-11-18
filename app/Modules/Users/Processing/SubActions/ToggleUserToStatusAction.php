<?php

namespace App\Modules\Users\Processing\SubActions;

class ToggleUserToStatusAction
{
    public function run($user,$newStatus)
    {
        $user->status = $newStatus;
        $user->save();

        return $user;
    }
}
