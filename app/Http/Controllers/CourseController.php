<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        
        if ($user->id_role == 1) {
            return view('error-404');
        } elseif ($user->id_role == 2) {
            return view('role-head/head-course-list');
        } else {
            return view('role-staff/staff-course-list');
        }
    }

    public function progress()
    {
        $user = Auth::user();
        
        if ($user->id_role == 1) {
            return view('error-404');
        } elseif ($user->id_role == 2) {
            return view('role-head/head-course-progress');
        } else {
            return view('role-staff/staff-course-progress');
        }
    }
}
