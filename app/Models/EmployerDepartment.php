<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployerDepartment extends Model
{
    protected $table = 'employers_departments';

    protected $fillable = [
        'employer_id',
        'department_id'
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
