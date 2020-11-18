<?php

namespace App\Modules\Users\Processing\Actions;

use App\Modules\Users\Data\Models\User;

class GetAllUsersAction
{
    public function run()
    {
        return User::all();
    }
}
