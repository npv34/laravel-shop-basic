<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
        $this->userService = $userService;
    }

    public function getAll()
    {
        $users = $this->userService->getAllUser();
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
        $user = $this->userService->findById($id);
        $this->userService->changePassword($user, $request);
        session()->flash('success', 'change password success!');
        return redirect()->route('users.list');
    }
}
