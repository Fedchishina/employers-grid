<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployersController extends Controller
{

    public function index()
    {
        $employers = Employer::orderBy('last_name')->get();
        return view('pages.employer.index', compact('employers'));
    }

    public function getAddForm()
    {
        $departments = Department::get();
        return view('pages.employer.add', compact('departments'));
    }
}
