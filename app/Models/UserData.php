<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'users'; // Nama tabel di database

    // Mendefinisikan relasi antara User dan Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

}