<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'отдел кадров'],
            ['name' => 'бухгалтерия'],
            ['name' => 'плановый отдел'],
            ['name' => 'библиотека'],
            ['name' => 'ахч'],
            ['name' => 'финансовый отдел'],
        ];
        \App\Models\Department::insert($departments);
    }
}
