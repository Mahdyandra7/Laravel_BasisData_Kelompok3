<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function timeline()
    {
        $user = Auth::user();
        
        if ($user->id_role == 1) {
            return view('error-404');
        } elseif (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('role-head/head-timeline');
        } else {
            return view('role-staff/staff-timeline');
        }
    }
}
