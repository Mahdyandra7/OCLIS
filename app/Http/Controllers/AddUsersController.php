<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;
use App\Models\Kementrian;
use App\Models\Role;

class AddUsersController extends Controller
{
    public function addusers()
    {
        $user = Auth::user();
        $users = UserData::all();
        $dept = Kementrian::all();
        $role = Role::all();

        $roleUser = Role::where('id', $user->id_role)->first();
        $username = $user->nama;
        $userrole = $roleUser->nama_role;
        
        if ($user->id_role == 1) {
            return view('role-admin/admin-addusers', compact('users','dept','role','username','userrole'));
        } else {
            return view('error-404');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            // Tambahkan validasi untuk input lainnya
        ]);

        // Simpan data pengguna ke dalam database
        $newUser = new UserData();
        $newUser->username = $request->input('username');
        $newUser->password = bcrypt($request->input('password'));
        $newUser->nama = $request->input('fullname');
        $newUser->nim = $request->input('studentid');
        $newUser->email = $request->input('emailname') . '@' . $request->input('email');
        $newUser->no_telp = $request->input('phone');
        $newUser->id_role = $request->input('role'); // Sesuaikan dengan field yang sesuai

        $newUser->save();

        return redirect()->route('users')->with('success', 'Pengguna berhasil ditambahkan.');
    }
}
