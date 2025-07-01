<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    protected $table = 'program_kerja'; // Nama tabel di database

    public function dept()
    {
        return $this->belongsTo(Kementrian::class, 'id_kementrian');
    }
}
