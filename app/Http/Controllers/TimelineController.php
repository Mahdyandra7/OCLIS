<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProgramKerja;
use App\Models\Kementrian;
use App\Models\UserData;
use App\Models\Role;

class TimelineController extends Controller
{
    public function timeline()
    {
        $user = Auth::user();

        $now = now(); // Waktu sekarang

        // Mendapatkan data dari database
        $programs = ProgramKerja::all();

        $futurePrograms = $programs->filter(function ($program) use ($now) {
            return $program->tanggal_mulai > $now;
        });
        
        $futureKementrian = collect();
        $futurePIC = collect();
        
        foreach ($futurePrograms as $program) {
            $futureKementrian->push(Kementrian::find($program->id_kementrian));
            $futurePIC->push(UserData::find($program->pic));
        }
        
        $ongoingPrograms = $programs->filter(function ($program) use ($now) {
            return $program->tanggal_mulai <= $now && $program->tanggal_selesai >= $now;
        });
        
        $ongoingKementrian = collect();
        $ongoingPIC = collect();
        
        foreach ($ongoingPrograms as $program) {
            $ongoingKementrian->push(Kementrian::find($program->id_kementrian));
            $ongoingPIC->push(UserData::find($program->pic));
        }
        
        $pastPrograms = $programs->filter(function ($program) use ($now) {
            return $program->tanggal_selesai < $now;
        });
        
        $pastKementrian = collect();
        $pastPIC = collect();
        
        foreach ($pastPrograms as $program) {
            $pastKementrian->push(Kementrian::find($program->id_kementrian));
            $pastPIC->push(UserData::find($program->pic));
        }

        $roleUser = Role::where('id', $user->id_role)->first();
        $username = $user->nama;
        $userrole = $roleUser->nama_role;
        
        if ($user->id_role == 1) {
            return view('error-404');
        } elseif (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('role-head/head-timeline', compact('futurePrograms', 'ongoingPrograms', 'pastPrograms','futureKementrian', 'ongoingKementrian', 'pastKementrian','futurePIC', 'ongoingPIC', 'pastPIC','username','userrole'));
        } else {
            return view('role-staff/staff-timeline', compact('futurePrograms', 'ongoingPrograms', 'pastPrograms','futureKementrian', 'ongoingKementrian', 'pastKementrian','futurePIC', 'ongoingPIC', 'pastPIC','username','userrole'));
        }
    }
}
