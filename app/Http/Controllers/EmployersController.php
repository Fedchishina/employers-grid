<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Requests\EmployerRequest;
use Mockery\Exception;

class EmployersController extends Controller
{

    /**
     * return view with Employers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employers = Employer::orderBy('last_name')->get();
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
        try {
            $input = $request->all();
            $employer = Employer::create($input);
            //insert departments, where employer is working
            $employer->departments()->attach($request->get('departments'));
            $employer->save();
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'сотрудник успешно добавлен'
            ]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Что-то пошло не так... Ошибка сервера.',
                'errorMessage' => $e->getMessage()
            ]);
        }
    }

    /**
     * return view for editing Employer
     * @param $id - id of Employer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getEditForm($id)
    {
        $employer = Employer::find($id);
        if($employer) {
            $departments = Department::get();
            return view('pages.employer.edit', compact('departments', 'employer'));
        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Что-то пошло не так... Ошибка сервера. Не найден сотрудник'
            ]);
        }
    }

    /**
     * Edit Employer
     * @param $id - id of Employer
     * @param EmployerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id, EmployerRequest $request)
    {
        $employer = Employer::find($id);
        if ($employer) {
            try {
                $input = $request->all();
                $employer->update($input);
                if ($newDepartments = array_diff($input['departments'], $employer->departments->pluck('id')->toArray())) {
                    //insert new departments of Employer
                    $employer->departments()->attach($newDepartments);
                }

                if ($deleteDepartments = array_diff($employer->departments->pluck('id')->toArray(), $input['departments'])) {
                    //delete departments
                    $employer->departments()->detach($deleteDepartments);
                }
                $employer->save();
                return redirect()->back()->with([
                    'status' => 'success',
                    'message' => 'информация о сотруднике успешно изменена'
                ]);
            }
            catch (\Exception $e) {
                return redirect()->back()->with([
                    'status' => 'danger',
                    'message' => 'Что-то пошло не так... Ошибка сервера.',
                    'errorMessage' => $e->getMessage()
                ]);
            }
        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Что-то пошло не так... Ошибка сервера. Не найден сотрудник'
            ]);
        }
    }

    /**
     * delete Employer
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function delete(Request $request)
    {
        try {
            Employer::destroy($request->get('id'));
            $employers = Employer::orderBy('last_name')->get();
            return view('pages.employer.table', compact('employers'));
        }
        catch (\Exception $e) {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Что-то пошло не так... Ошибка сервера.',
                'errorMessage' => $e->getMessage()
            ]);
        }
    }
}
