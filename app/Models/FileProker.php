<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileProker extends Model
{
    protected $table = 'file_proker';
    protected $fillable = ['nama_file', 'deskripsi_file', 'progress_ke', 'url_file', 'id_proker'];

    public function proker()
    {
        return $this->belongsTo(ProgramKerja::class, 'id_proker');
    }
}
