<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileProker;

class FileProkerController extends Controller
{
    public function create()
    {
        return view('role-staff/staff-addfile'); // Menampilkan halaman pengunggahan file
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

        $fileProker->progress_ke = 0;
        $fileProker->id_proker = 1;

        $fileProker->save();

        return redirect()->route('dashboard');
    }
}

