<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;

class DepartmentsController extends Controller
{
    /**
     * return view with departments
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = Department::getAllDepartments();
        $activePage = 'departments';
        return view('pages.department.index', compact('departments', 'activePage'));
    }

    /**
     * insert department
     * @param DepartmentRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(DepartmentRequest $request)
    {
        $input = $request->all();
        Department::create($input);
        $departments = Department::getAllDepartments();
        return view('pages.department.table', compact('departments'));
    }

    /**
     * edit department
     * @param DepartmentRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(DepartmentRequest $request)
    {
        $input = $request->all();
        $department = Department::findOrFail($input['id']);
        $department->update($input);
        $departments = Department::getAllDepartments();
        return view('pages.department.table', compact('departments'));
    }

    /**
     * delete department
     * @param $id - id of department
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)
    {
        Department::findOrFail($id)->destroy($id);
        $departments = Department::getAllDepartments();
        return view('pages.department.table', compact('departments'));
    }
}
