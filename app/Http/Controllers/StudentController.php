<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return inertia('Modules/Students/Index');
    }

    public function create(){
        return inertia('Modules/Students/Create');
    }
}
