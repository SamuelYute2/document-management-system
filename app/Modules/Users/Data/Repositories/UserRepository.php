<?php

namespace App\Modules\Users\Data\Repositories;

use App\Modules\Users\Data\Models\User;
use App\Modules\Users\Processing\Tasks\AssignUserRandomPasswordTask;
use Carbon\Carbon;

class UserRepository {

    public function getAll()
    {
        return User::all();
    }

    public function get($id)
    {
        return User::find($id);
    }

    public function getBy($field, $value)
    {
        return User::where($field, $value)->first();
    }

    public function getAllWith($relationships)
    {
        return User::with($relationships)->get();
    }

    public function create($data, Employee $employee)
    {
        $user = new User;
        $user->fill($data);
        $user->status = 0;

        $this->assignPassword($user,$data['password']);

        $user->employee()->associate($employee);
        $user->save();

        return $user;
    }

    public function update($data, User $user)
    {
        $user->update($data);

        return $user;
    }

    public function delete(User $user)
    {
        return $user->delete();
    }

    public function updateLastLogin(User $user)
    {
        $user->last_login = Carbon::now();
        $user->save();
    }

    public function assignPassword(&$user, $password)
    {
        $user->old_password = $password;
        $user->password = bcrypt($password);
    }
}
