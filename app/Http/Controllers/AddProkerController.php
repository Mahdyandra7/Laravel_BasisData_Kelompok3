<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProgramKerja;
use App\Models\Kementrian;
use App\Models\UserData;
use App\Models\FileProker;

class AddProkerController extends Controller
{
    public function addproker()
    {
        $user = Auth::user();
        $users = UserData::all();
        $dept = Kementrian::all();
        
        if (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('role-head/head-addcourse', compact('dept','users'));
        
        } else {
            return view('error-404');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'proker_name' => 'required',
            'proker_pic' => 'required',
            'proker_dept' => 'required',
            'proker_period' => 'required',
            'proker_progress' => 'required',
            'proker_start' => 'required',
            'proker_end' => 'required',
        ]);

        $proker = new ProgramKerja();
        $proker->nama_proker = $request->input('proker_name');
        $proker->deskripsi = $request->input('proker_desc');
        $proker->pic = $request->input('proker_pic');
        $proker->id_kementrian = $request->input('proker_dept');
        $proker->periode = $request->input('proker_period');
        $proker->total_progress = $request->input('proker_progress');
        $proker->tanggal_mulai = $request->input('proker_start');
        $proker->tanggal_selesai = $request->input('proker_end');
        
        $proker->save();

        return redirect()->route('course-list');
    }
}
