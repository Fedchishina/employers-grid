<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employers';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'gender',
        'salary'
    ];

    public function employerDepartments()
    {
        return $this->hasMany(EmployerDepartment::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'employers_departments');
    }

    public function departmentsStr(){
        $departmentsStr = '';
        foreach ($this->departments as $department){
            $departmentsStr .= $department->name . ', ';
        }
        return rtrim($departmentsStr, ", ");
    }


}
