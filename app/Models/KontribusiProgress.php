<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontribusiProgress extends Model
{
    use HasFactory;

    protected $table = 'kontribusi_progress';

    protected $fillable = [
        'id_progress',
        'id_user',
        'nilai_kontribusi',
    ];

    // Define relationships if needed
    public function progress()
    {
        return $this->belongsTo(FileProker::class, 'id_progress');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

