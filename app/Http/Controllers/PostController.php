<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::where('active', true)->get();

        return view('posts', compact('posts'));
    }

    /**
     * Get post by id
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function post(int $id)
    {
        $post = Post::find($id);

        if (!$post) {
            abort('404');
        }

        return view('post', compact('post'));
    }
}
