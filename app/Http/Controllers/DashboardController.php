<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;
use App\Models\Kementrian;
use App\Models\Role;
use App\Models\ProgramKerja;
use App\Models\FileProker;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $users = UserData::all();
        $dept = Kementrian::all();
        $roles = Role::all();
        $roleUser = Role::where('id', $user->id_role)->first();
        $selectedDept = $roleUser->id_kementrian;  
        
        if ($selectedDept) {
            $proker = ProgramKerja::where('id_kementrian', $selectedDept)->get();

        } else {
            $proker = collect(); 
        }

        $prokerIds = $proker->pluck('id');
        $fileproker = FileProker::whereIn('id_proker', $prokerIds)->get();

        $maxProgress = [];
        foreach ($proker as $program) {
            $maxProgress[$program->id] = $fileproker->where('id_proker', $program->id)->max('progress_ke');
        }
    
        
        if ($user->id_role == 1) {
            return view('role-admin.admin-index', compact('users','dept','roles'));
        } elseif (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('role-head/head-index', compact('users','dept','roles','proker','maxProgress'));
        } else {
            return view('role-staff/staff-index', compact('users','dept','roles','proker','maxProgress'));
        }

    }
}
