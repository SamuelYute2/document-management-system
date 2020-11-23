<?php

namespace App\Modules\Employees\Data\Models;

use App\Modules\Departments\Data\Models\Department;
use App\Modules\Users\Data\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'first_name', 'last_name','email', 'avatar'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
