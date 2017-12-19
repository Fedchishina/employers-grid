<?php

use Illuminate\Database\Seeder;

class EmployersDepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmentsIds = \App\Models\Department::pluck('id')->toArray();
        $employersIds = \App\Models\Employer::pluck('id')->toArray();
        $employerDepartments = [];
        foreach ($employersIds as $key => $employersId) {
            $employerDepartments[$key]['employer_id'] = $employersId;
            $employerDepartments[$key]['department_id'] = $departmentsIds[rand(0, count($departmentsIds) - 1)];
        }
        \App\Models\EmployerDepartment::insert($employerDepartments);

    }
}
