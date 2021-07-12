<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            'posts' => $this->getPosts(),
            'categories' => Category::all(),
            'mainCategory' => Category::firstWhere('name',request('category'))
        ]);
    }

    public function show(Post $post){
        return view('post', [
            'post' => $post,
            'comments' => $post->comments
        ]);
    }

    public function getPosts(){
        return Post::latest()->filter(request(['search','category','author']))->paginate(3)->withQueryString();
    }
}
