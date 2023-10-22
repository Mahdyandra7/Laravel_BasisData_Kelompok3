<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kementrian;

class DepartementController extends Controller
{
    public function dept()
    {
        $user = Auth::user();
        $dept = Kementrian::all();
        
        if ($user->id_role == 1) {
            return view('role-admin/admin-departement', compact('dept'));
        } else {
            return view('error-404');
        }
    }

    public function destroy($id)
    {
        $dept = Kementrian::find($id);

        if ($dept) {
            $dept->delete();
            return redirect()->route('dept')->with('success', 'User deleted successfully');
        }

        return redirect()->route('dept')->with('error', 'User not found');
    }

    public function update(Request $request, $id)
    {
        // Find the user to update
        $dept = Kementrian::find($id);

        if ($dept) {
            // Apply changes
            $dept->nama_kementrian =  $request->input('deptname');
            $dept->deskripsi =  $request->input('deptdesc');
            $dept->periode =  $request->input('deptperiod');

            // Save the changes
            $dept->save();

            return redirect()->route('dept')->with('success', 'User updated successfully');
        }

        return redirect()->route('dept')->with('error', 'User not found');
    }
}
