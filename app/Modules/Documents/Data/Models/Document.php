<?php

namespace App\Modules\Documents\Data\Models;

use App\Modules\Departments\Data\Models\Department;
use App\Modules\Employees\Data\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'index', 'url', 'path', 'type'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function versions()
    {
        return $this->belongsToMany(Document::class, 'document_version', 'original_document_id', 'new_document_id');
    }
}
