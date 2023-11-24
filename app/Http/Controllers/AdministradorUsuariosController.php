<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

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

    public function changeApprovalStatus(Request $request)
    {
        // Definimos la regla de validación personalizada para el campo "approved"
        $request->validate([
            'approved' => Rule::in(['0', '1']),
        ]);
    
        // Obtenemos el usuario específico por ID
        $user = User::findOrFail($request->user_id);
    
        // Obtenemos el valor actual de "approved" y lo invertimos
        $newApprovedValue = ($user->approved == '0') ? '1' : '0';
    
        // Actualizamos el estado de aprobación (approved) en la base de datos
        $user->update(['approved' => $newApprovedValue]);
    
        // Redirigimos al usuario a la página anterior junto con un mensaje de éxito
        return redirect()->back()->with('message', 'Approval status updated successfully');
    }
}


