<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employer;
use App\Http\Requests\EmployerRequest;

class EmployersController extends Controller
{

    /**
     * return view with Employers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employers = Employer::getEmployers();
        $activePage = 'employers';
        return view('pages.employer.index', compact('employers', 'activePage'));
    }

    /**
     * return view for adding Employer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAddForm()
    {
        $departments = Department::get();
        return view('pages.employer.add', compact('departments'));
    }

    /**
     * add Employer
     * @param EmployerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(EmployerRequest $request)
    {
        $input = $request->all();
        Employer::createWithDepartments($input);
        return redirect()->back()->with([
            'status' => 'success',
            'message' => __('variables.employers.success_add')
        ]);
    }

    /**
     * return view for editing Employer
     * @param $id - id of Employer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getEditForm($id)
    {
        $employer = Employer::findorfail($id);
        $departments = Department::get();
        return view('pages.employer.edit', compact('departments', 'employer'));
    }

    /**
     * Edit Employer
     * @param $id - id of Employer
     * @param EmployerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id, EmployerRequest $request)
    {
        $employer = Employer::findorfail($id);
        $input = $request->all();
        $employer->updateWithDepartments($input);
        return redirect()->back()->with([
            'status' => 'success',
            'message' => __('variables.employers.success_edit'),
        ]);
    }

    /**
     * delete Employer
     * @param $id - id of Employer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function delete($id)
    {
        Employer::destroy($id);
        $employers = Employer::getEmployers();
        return view('pages.employer.table', compact('employers'));
    }
}
