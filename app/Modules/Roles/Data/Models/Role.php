<?php

namespace App\Modules\Roles\Data\Models;

use App\Modules\Documents\Data\Models\Document;
use App\Modules\Employees\Data\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;

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
        return $this->belongsToMany(Employee::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }
}
