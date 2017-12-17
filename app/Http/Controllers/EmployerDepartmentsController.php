<?php

namespace App\Http\Controllers;

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
        return view('index');
    }
}
