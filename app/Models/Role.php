<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles'; // Nama tabel di database

    // Mendefinisikan relasi antara User dan Role
    public function dept()
    {
        return $this->belongsTo(Kementrian::class, 'id_kementrian');
    }
}
