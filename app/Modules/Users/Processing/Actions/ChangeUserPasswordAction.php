<?php

namespace App\Modules\Users\Processing\Actions;

class ChangeUserPasswordAction
{
    public function run($user,$newPassword)
    {
        $user->password = bcrypt($newPassword);

        return $user->save();
    }
}
