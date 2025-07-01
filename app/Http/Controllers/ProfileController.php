<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        
        if ($user->id_role == 1) {
            return view('role-admin/admin-profile');
        } elseif (in_array($user->id_role, [2, 3, 4, 5])) {
            return view('role-head/head-profile');
        } else {
            return view('role-staff/staff-profile');
        }
    }
}
