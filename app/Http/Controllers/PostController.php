<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('active', true)->get();

        return view('posts', compact('posts'));
    }

    public function post(int $id) {
        $post = Post::find($id);

        if(!$post) {
            abort('404');
        }

        return view('post', compact('post'));
    }
}
