<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;
use App\Models\Kementrian;
use App\Models\Role;

class UsersController extends Controller
{
    public function users()
    {
        $user = Auth::user();
        $users = UserData::all();
        $dept = Kementrian::all();
        $role = Role::all();

        $roleUser = Role::where('id', $user->id_role)->first();
        $username = $user->nama;
        $userrole = $roleUser->nama_role;
        
        if ($user->id_role == 1) {
            return view('role-admin/admin-users', compact('users','dept','role','username','userrole'));
        } else {
            return view('error-404');
        }
    }

    public function destroy($id)
    {
        $user = UserData::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('users')->with('success', 'User deleted successfully');
        }

        return redirect()->route('users')->with('error', 'User not found');
    }

    public function update(Request $request, $id)
    {
        // Find the user to update
        $user = UserData::find($id);

        if ($user) {
            // Apply changes
            $user->username = $request->input('new_username');
            $user->password = bcrypt($request->input('new_password'));
            $user->nama = $request->input('new_fullname');
            $user->nim = $request->input('new_sid');
            $user->email = $request->input('new_email');
            $user->no_telp = $request->input('new_phonenum');
            $user->id_role = $request->input('new_role');
            // If the department column name is different, update it accordingly.
            // $user->department = $request->input('new_department');

            // Save the changes
            $user->save();

            return redirect()->route('users')->with('success', 'User updated successfully');
        }

        return redirect()->route('users')->with('error', 'User not found');
    }




}
