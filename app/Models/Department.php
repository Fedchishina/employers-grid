<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'name',
    ];

    public function employerDepartments()
    {
        return $this->hasMany(EmployerDepartment::class);
    }

    public function maxSalary()
    {
        $maxSalary = DB::table('employers')
            ->join('employers_departments', 'employers.id', '=', 'employers_departments.employer_id')
            ->where('employers_departments.department_id', $this->id)
            ->max('salary');
        return empty($maxSalary) ? 0 : $maxSalary;
    }

    public function employers()
    {
        return $this->belongsToMany(Employer::class, 'employers_departments');
    }
}
