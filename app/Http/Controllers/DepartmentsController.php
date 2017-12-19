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
        $departments = Department::with('employerDepartments')->get();
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
        try {
            Department::create($input);
            $departments = Department::with('employerDepartments')->get();
            return view('pages.department.table', compact('departments'));
        }
        catch (\Exception $e) {
            abort(500, 'Something went wrong. ' . $e->getMessage());
        }
    }

    /**
     * edit department
     * @param DepartmentRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(DepartmentRequest $request)
    {
        $input = $request->all();
        $department = Department::find($input['id']);
        if($department) {
            try {
                $department->update($input);
                $departments = Department::with('employerDepartments')->get();
                return view('pages.department.table', compact('departments'));
            }
            catch (\Exception $e) {
                abort(500, 'Something went wrong. ' . $e->getMessage());
            }
        } else {
            abort(500, 'Something went wrong. Department not found');
        }
    }

    /**
     * delete department
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete(Request $request)
    {
        try {
            Department::destroy($request->get('id'));
            $departments = Department::with('employerDepartments')->get();
            return view('pages.department.table', compact('departments'));
        }
        catch (\Exception $e) {
            abort(500, 'Something went wrong. ' . $e->getMessage());
        }
    }

}
