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
            abort(500, 'Что-то пошло не так... Ошибка сервера.');
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
                abort(500, 'Что-то пошло не так... Ошибка сервера.');
            }
        } else {
            abort(500, 'Ошибка сервера: не найден отдел');
        }
    }

    /**
     * delete department
     * @param $id - id of department
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)
    {
        $department = Department::find($id);
        if ($department) {
            if ($department->employers->count() > 0) {
                abort(500, 'нельзя удалить отдел, в котором есть сотрудники');
            } else {
                try {
                    Department::destroy($id);
                    $departments = Department::with('employerDepartments')->get();
                    return view('pages.department.table', compact('departments'));
                }
                catch (\Exception $e) {
                    abort(500, 'Что-то пошло не так... Ошибка сервера.');
                }
            }
        } else {
            abort(500, 'Ошибка сервера: не найден отдел');
        }
    }

}
