<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAll()
    {
        $categories = Category::all();
        return view('categories.list', compact('categories'));
    }
}
