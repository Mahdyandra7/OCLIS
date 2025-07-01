<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kementrian;
use App\Models\Role;

class AddRolesController extends Controller
{
    public function addroles()
    {
        $user = Auth::user();
        $dept = Kementrian::all();
        $role = Role::all();

        $roleUser = Role::where('id', $user->id_role)->first();
        $username = $user->nama;
        $userrole = $roleUser->nama_role;
        
        if ($user->id_role == 1) {
            return view('role-admin/admin-addroles', compact('dept','role','username','userrole'));
        } else {
            return view('error-404');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'rolesname' => 'required',
            'rolesperiod' => 'required',
            'rolesdept' => 'required'
        ]);

        $newRoles = new Role();
        $newRoles->nama_role = $request->input('rolesname');
        $newRoles->periode = $request->input('rolesperiod');
        $newRoles->id_kementrian = $request->input('rolesdept');
        
        $newRoles->save();

        return redirect()->route('roles');
    }

    
}
