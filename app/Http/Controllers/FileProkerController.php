<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileProker;
use Illuminate\Support\Facades\Auth;
use App\Models\ProgramKerja;
use App\Models\Role;
use App\Models\KontribusiProgress;
use App\Models\UserData;


class FileProkerController extends Controller
{
    public function create()
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

        $roleUser = Role::where('id', $user->id_role)->first();
        $username = $user->nama;
        $userrole = $roleUser->nama_role;

        if ($user->id_role == 1) {
            return view('error-404');}

        elseif (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('error-404');
        
        } else {
            return view('role-staff/staff-addfile', compact('proker','users','username','userrole'));
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

        $kontribusi = new KontribusiProgress();
        $kontribusi->id_progress = $fileProker->id;
        $kontribusi->id_user = $fileProker->proker->pic;
        $kontribusi->nilai_pic = 10;
        $kontribusi->nilai_head = 0;
        $kontribusi->save();

        $staff = $request->input('staff');
        $scores = $request->input('scores');
    
        // Validasi bahwa jumlah staf dan skor sesuai
        if (count($staff) !== count($scores)) {
            return redirect()->route('course-progress')->with('error', 'Invalid input data');
        }
    
        // Loop untuk menyimpan kontribusi untuk setiap staf
        foreach ($staff as $key => $staffId) {
            $kontribusi2 = new KontribusiProgress();
            $kontribusi2->id_progress = $fileProker->id;
            $kontribusi2->id_user = $staffId;
            $kontribusi2->nilai_pic = $scores[$key];
            $kontribusi2->nilai_head = 0;
            $kontribusi2->save();
        }

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
        // Find the file to update
        $file = FileProker::find($id);
    
        if ($file) {
            // Apply changes to the FileProker table
            $file->messages = $request->input('msg');
            $file->progress_ke = $request->input('progress');
            $file->status = 'Verified';
            $file->save();
        
            $nilaiHead = $request->input('score');

            // Update entries in the KontribusiProgress table
            KontribusiProgress::where('id_progress', $file->id)
                ->update([
                    'nilai_head' => $nilaiHead,
                ]);
            
            return redirect()->route('course-progress')->with('success', 'File verified successfully');
        }
    
        return redirect()->route('course-progress')->with('error', 'File not found');
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

