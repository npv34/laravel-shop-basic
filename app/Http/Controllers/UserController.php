<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    public function getAll()
    {
        $users = $this->user->all();
        return view('users.list', compact('users'));
    }

    public function delete($id) {
        $user = $this->user->find($id);
        $user->delete();
        return redirect()->route('users.list');
    }

    public function showFormChangePassword($id) {
        //lay user trong database
        $user = $this->user->findOrFail($id);
        return view('users.change-password', compact('user'));
    }

    public function changePassword(Request $request, $id)  {
        $user = $this->user->findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('success', 'change password success!');
        return redirect()->route('users.list');
    }
}
