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

    /**
     * get departments of employer by one string
     * @return string
     */
    public function departmentsStr(){
        return implode(', ', $this->departments->pluck('name')->toArray());
    }

    /**
     * get employers
     * @param int $paginateCount
     * @return mixed
     */
    public static function getEmployers($paginateCount = 5)
    {
        return self::orderBy('last_name')->paginate($paginateCount);
    }

    /**
     * create employer with input departments
     * @param $params
     */
    public static function createWithDepartments($params)
    {
        $employer = self::create($params);
        $employer->departments()->attach($params['departments']);
        $employer->save();
    }

    /**
     * update employer with input departments
     * @param $params
     */
    public function updateWithDepartments($params)
    {
        $this->update($params);
        if ($newDepartments = array_diff($params['departments'], $this->departments->pluck('id')->toArray())) {
            //insert new departments of Employer
            $this->departments()->attach($newDepartments);
        }

        if ($deleteDepartments = array_diff($this->departments->pluck('id')->toArray(), $params['departments'])) {
            //delete departments
            $this->departments()->detach($deleteDepartments);
        }
        $this->save();
    }
}
