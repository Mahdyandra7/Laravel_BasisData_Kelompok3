<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kementrian;

class AddDepartementController extends Controller
{
    public function adddept()
    {
        $user = Auth::user();
        $dept = Kementrian::all();
        
        if ($user->id_role == 1) {
            return view('role-admin/admin-adddepartement', compact('dept'));
        } else {
            return view('error-404');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'deptname' => 'required',
            'deptdesc' => 'required',
            'deptperiod' => 'required',
        ]);

        $newDept = new Kementrian();
        $newDept->nama_kementrian =  $request->input('deptname');
        $newDept->deskripsi =  $request->input('deptdesc');
        $newDept->periode =  $request->input('deptperiod');

        $newDept->save();

        return redirect()->route('dept');
    }
}
