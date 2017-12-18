<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employer;
use App\Models\EmployerDepartment;
use Illuminate\Http\Request;

class EmployerDepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        $employers = Employer::orderBy('last_name')->get();
        return view('index', compact('departments', 'employers'));
    }
}
