<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdministradorUsuariosController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        // Only allow admin users to see this view
        if (!$request->user()->is_admin) {
            return redirect('/home')->with('error', 'You do not have permission to access this page');
        }

        return view('admin.users.index', compact('users'));
    }

    public function show(Request $request, User $user)
    {
        // Only allow admin users to see user details
        if (!$request->user()->is_admin) {
            return redirect('/home')->with('error', 'You do not have permission to access this page');
        }

        return view('admin.users.show', compact('user'));
    }
}


