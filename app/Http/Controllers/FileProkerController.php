<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileProker;
use Illuminate\Support\Facades\Auth;
use App\Models\ProgramKerja;


class FileProkerController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $proker = ProgramKerja::all();


        if ($user->id_role == 1) {
            return view('error-404');}

        elseif (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('error-404');
        
        } else {
            return view('role-staff/staff-addfile', compact('proker'));
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file',
            'desc' => 'required',

        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName); // Simpan file di folder 'uploads'

        $fileProker = new FileProker;
        $fileProker->nama_file = $request->input('title');
        $fileProker->deskripsi_file = $request->input('desc');
        $fileProker->url_file = $filePath;
        $fileProker->id_proker = $request->input('course');

        $fileProker->progress_ke = 0;
        $fileProker->status = 'Pending';

        $fileProker->save();

        return redirect()->route('course-progress');
        
    }

    public function destroy($id)
    {
        $file = FileProker::find($id);

        if ($file) {
            $file->delete();
            return redirect()->route('course-progress')->with('success', 'User deleted successfully');
        }

        return redirect()->route('course-progress')->with('error', 'User not found');
    }

    public function update(Request $request, $id)
    {
        // Find the user to update
        $file = FileProker::find($id);

        if ($file) {
            // Apply changes
            $files = $request->file('file');
            $fileName = time() . '_' . $files->getClientOriginalName();
            $filePath = $files->storeAs('uploads', $fileName); // Simpan file di folder 'uploads'

            $file->nama_file = $request->input('title');
            $file->deskripsi_file = $request->input('desc');
            $file->url_file = $filePath;

            $file->progress_ke = 0;
            $file->status = 'Pending';
            $file->messages = '';

            $file->save();

            return redirect()->route('course-progress')->with('success', 'User updated successfully');
        }

        return redirect()->route('course-progress')->with('error', 'User not found');
    }

    public function verif(Request $request, $id)
    {
        // Find the user to update
        $file = FileProker::find($id);

        if ($file) {
            // Apply changes
            $file->messages = $request->input('msg');
            $file->progress_ke = $request->input('progress');
            $file->status = 'Verified';

            $file->save();

            return redirect()->route('course-progress')->with('success', 'User updated successfully');
        }

        return redirect()->route('course-progress')->with('error', 'User not found');
    }

    public function revision(Request $request, $id)
    {
        // Find the user to update
        $file = FileProker::find($id);

        if ($file) {
            // Apply changes
            $file->messages = $request->input('msg');
            $file->status = 'Revision';
            $file->progress_ke = 0;

            $file->save();

            return redirect()->route('course-progress')->with('success', 'User updated successfully');
        }

        return redirect()->route('course-progress')->with('error', 'User not found');
    }
}

