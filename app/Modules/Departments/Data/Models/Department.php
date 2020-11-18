<?php

namespace App\Modules\Departments\Data\Models;

use App\Modules\Employees\Data\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
