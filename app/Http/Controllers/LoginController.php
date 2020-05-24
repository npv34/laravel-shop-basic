<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function showFormLogin() {
        $message = 'nhap data vao form';
        return view('login', compact('message'));
    }

    function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $user = [
            'username' => $email,
            'password' => $password
        ];

        if (Auth::attempt($user)) {
            return redirect()->route('users.list');
        } else {
            return back();
        }
    }
}
