<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employer;
use App\Models\EmployerDepartment;
use Illuminate\Http\Request;

class EmployerDepartmentsController extends Controller
{
    /**
     * return view with grid of Employers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = Department::get();
        $employers = Employer::orderBy('last_name')->paginate(5);
        $activePage = 'employers-departments';
        return view('index', compact('departments', 'employers', 'activePage'));
    }
}
