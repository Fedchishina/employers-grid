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

    /**
     * find max salary between employers of department
     * @return int
     */
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

    /**
     * delete departments (overloaded function)
     * @param array|int $ids
     * @return int|void
     */
    public static function destroy($ids)
    {
        $ids = is_array($ids) ? $ids : func_get_args();
        $employersCount = DB::table('employers_departments')->whereIn('department_id', $ids)->count();
        //check that departments do not have employees
        $employersCount > 0 ? abort(500, __('variables.department.delete_warning')) : parent::destroy($ids);
    }

    /**
     * get all departments with employers
     */
    public static function getAllDepartments()
    {
        return self::with('employerDepartments')->get();
    }
}
