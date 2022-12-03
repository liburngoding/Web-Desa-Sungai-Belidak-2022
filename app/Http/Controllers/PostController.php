<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::latest();

        $title= '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            // $title = ' in ' . $category->name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            // $title = ' by ' . $author->name;
        }
        return view('beritas',[
            "title" => "All Posts" . $title,
            "active" => 'posts',
            'categories' => Category::all(),
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('berita', [
            "title" => "Single Post",
            "active" => 'posts',
            'categories' => Category::all(),
            "post" => $post
        ]);
    }
}
