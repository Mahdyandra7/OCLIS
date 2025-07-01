<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kementrian;
use App\Models\Role;

class RolesController extends Controller
{
    public function roles()
    {
        $user = Auth::user();
        $dept = Kementrian::all();
        $roles = Role::all();

        $roleUser = Role::where('id', $user->id_role)->first();
        $username = $user->nama;
        $userrole = $roleUser->nama_role;
        
        if ($user->id_role == 1) {
            return view('role-admin/admin-roles', compact('roles','dept','username','userrole'));
        } else {
            return view('error-404');
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        if ($role) {
            $role->delete();
            return redirect()->route('roles')->with('success', 'User deleted successfully');
        }

        return redirect()->route('roles')->with('error', 'User not found');
    }

    public function update(Request $request, $id)
    {
        // Find the user to update
        $role = Role::find($id);

        if ($role) {
            // Apply changes
            $role->nama_role =  $request->input('rolesname');
            $role->periode =  $request->input('rolesperiod');
            $role->id_kementrian = $request->input('rolesdept');

            // Save the changes
            $role->save();

            return redirect()->route('roles')->with('success', 'User updated successfully');
        }

        return redirect()->route('roles')->with('error', 'User not found');
    }
}
