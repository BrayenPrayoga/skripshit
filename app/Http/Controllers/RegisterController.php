<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function show()
    {
        $data['role'] = Role::get();

        return view('register', $data);
    }
    
    public function register(Request $request)
    {
        $data = [
            'name'      => $request->nama,
            'email'     => $request->email,
            'role'      => $request->role,
            'password'  => Hash::make($request->password),
        ];
        User::create($data);

        return redirect('login');

    }
}
