<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with('employerDepartments')->get();
        $activePage = 'departments';
        return view('pages.department.index', compact('departments', 'activePage'));
    }

    public function add(DepartmentRequest $request)
    {
        $input = $request->all();
        Department::create($input);
        $departments = Department::with('employerDepartments')->get();
        return view('pages.department.table', compact('departments'));
    }

    public function edit(DepartmentRequest $request)
    {
        $input = $request->all();
        $department = Department::find($input['id']);
        $department->update($input);
        $departments = Department::with('employerDepartments')->get();
        return view('pages.department.table', compact('departments'));
    }

    public function delete(Request $request)
    {
        Department::destroy($request->get('id'));
        $departments = Department::with('employerDepartments')->get();
        return view('pages.department.table', compact('departments'));
    }

}
