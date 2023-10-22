<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;
use App\Models\Kementrian;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = UserData::all();
        $dept = Kementrian::all();
        $roles = Role::all();
        
        if ($user->id_role == 1) {
            return view('role-admin.admin-index', compact('users','dept','roles'));
        } elseif ($user->id_role == 2) {
            return view('role-head/head-index');
        } else {
            return view('role-staff/staff-index');
        }
    }
}
