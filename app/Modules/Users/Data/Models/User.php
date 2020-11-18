<?php

namespace App\Modules\Users\Data\Models;

use App\Modules\Core\AccessControl\Roles\Other\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function employee()
    {
        return $this->belongsTo();
    }
}
