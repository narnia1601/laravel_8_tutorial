<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class UserController extends Controller
{
    public function index(User $user){
        return view('posts', [
            'posts' => $user->post,
            'categories' => Category::all(),
            'mainCategory' => null
        ]);
    }
}
