<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kementrian;
use App\Models\UserData;
use App\Models\Role;
use App\Models\ProgramKerja;
use App\Models\FileProker;


class CourseController extends Controller
{
    public function list(Request $request)
    {
        $user = Auth::user();
        $roleUser = Role::where('id', $user->id_role)->first();
        $userDept = $roleUser->id_kementrian;  
        
        if ($userDept) {
            $dept = Kementrian::where('id', $userDept)->get();

        } else {
            $dept = collect(); 
        }

        $selectedDept = $request->input('departmentSelect');

        if ($selectedDept) {
            $proker = ProgramKerja::where('id_kementrian', $selectedDept)->get();

        } else {
            $proker = collect(); 
        }

        $userIds = $proker->pluck('pic');
        $users = UserData::whereIn('id', $userIds)->get();

        $prokerIds = $proker->pluck('id');
        $files = FileProker::whereIn('id_proker', $prokerIds)->get();

        $maxProgress = [];
        foreach ($proker as $program) {
            $maxProgress[$program->id] = $files->where('id_proker', $program->id)->max('progress_ke');
        }

        $userproker = UserData::all();

        $roleUser = Role::where('id', $user->id_role)->first();
        $username = $user->nama;
        $userrole = $roleUser->nama_role;
        
        if ($user->id_role == 1) {
            return view('error-404');
        } elseif (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('role-head/head-course-list', compact('dept','users','proker','maxProgress','userproker','username','userrole'));
        } else {
            return view('role-staff/staff-course-list', compact('dept','users','proker','maxProgress','username','userrole'));
        }
    }

    public function progress(Request $request)
    {
        $user = Auth::user();
        $roleUser = Role::where('id', $user->id_role)->first();
        $selectedDept = $roleUser->id_kementrian;
        $users = UserData::all();  
        
        if ($selectedDept) {
            $proker = ProgramKerja::where('id_kementrian', $selectedDept)->get();

        } else {
            $proker = collect(); 
        }

        $courseSelect = $request->input('courseSelect');

        if ($courseSelect) {
            $files = FileProker::where('id_proker', $courseSelect)->get();

        } else {
            $files = collect(); 
        }

        if ($proker) {
            $proker_pic = ProgramKerja::where('pic', $user->id)->get();

        } else {
            $proker_pic = collect(); 
        }

        $roleUser = Role::where('id', $user->id_role)->first();
        $username = $user->nama;
        $userrole = $roleUser->nama_role;
        
        if ($user->id_role == 1) {
            return view('error-404');
        } elseif (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('role-head/head-course-progress', compact('proker','files','username','userrole'));
        } else {
            return view('role-staff/staff-course-progress', compact('users','proker_pic','files','username','userrole'));
        }
    }

    public function destroy($id)
    {
        $proker = ProgramKerja::find($id);

        if ($proker) {
            $proker->delete();
            return redirect()->route('course-list')->with('success', 'User deleted successfully');
        }

        return redirect()->route('course-list')->with('error', 'User not found');
    }

    public function update(Request $request, $id)
    {
        // Find the user to update
        $proker = ProgramKerja::find($id);

        if ($proker) {
            // Apply changes
            $proker->nama_proker = $request->input('proker_name');
            $proker->deskripsi = $request->input('proker_desc');
            $proker->pic = $request->input('proker_pic');
            $proker->id_kementrian = $request->input('proker_dept');
            $proker->periode = $request->input('proker_period');
            $proker->total_progress = $request->input('proker_progress');
            $proker->tanggal_mulai = $request->input('proker_start');
            $proker->tanggal_selesai = $request->input('proker_end');

            // Save the changes
            $proker->save();

            return redirect()->route('course-list')->with('success', 'User updated successfully');
        }

        return redirect()->route('course-list')->with('error', 'User not found');
    }
}
