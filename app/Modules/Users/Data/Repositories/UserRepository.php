<?php

namespace App\Modules\Users\Data\Repositories;

use App\Modules\Employees\Data\Models\Employee;
use App\Modules\Users\Data\Models\User;
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

    public function create($data, Employee $employee)
    {
        $user = new User;
        $user->fill($data);
        $user->password = $data['password'];

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
}
