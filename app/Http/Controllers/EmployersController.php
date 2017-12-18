<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Requests\EmployerRequest;

class EmployersController extends Controller
{

    public function index()
    {
        $employers = Employer::orderBy('last_name')->get();
        $activePage = 'employers';
        return view('pages.employer.index', compact('employers', 'activePage'));
    }

    public function getAddForm()
    {
        $departments = Department::get();
        return view('pages.employer.add', compact('departments'));
    }

    public function add(EmployerRequest $request)
    {
        $input = $request->all();
        $employer = Employer::create($input);
        if ($request->get('departments')) {
            $employer->departments()->attach($request->get('departments'));
        }
        $message = ($employer->save()) ? 'сотрудник успешно добавлен' : 'при добавлении сотрудника возникли ошибки';
        return redirect()->back()->with('success-message', $message);
    }

    public function delete(Request $request)
    {
        Employer::destroy($request->get('id'));
        $employers = Employer::orderBy('last_name')->get();
        return view('pages.employer.table', compact('employers'));
    }
}
