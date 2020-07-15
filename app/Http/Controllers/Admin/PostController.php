<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
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
        $posts = Post::orderByDesc('updated_at')->get();

        return view('admin.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::where('active', true)->get();

        return view('admin.post', ['post' => null, 'categories' => $categories]);
    }

    /**
     * @param PostRequest $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function store(PostRequest $request)
    {
        $post = new Post($request->all());
        $post->active = $request->has('active');
        $post->user_id = \Auth::getUser()->id;

        DB::transaction(function () use ($post, $request) {
            $post->save();
            $post->reattachCategories($request->categories);
        });

        return redirect()
            ->route('admin.posts.index')
            ->with('success', __('Post successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit(Post $post)
    {

        $categories = Category::where('active', true)->get();

        return view('admin.post', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->active = $request->has('active');
        $post->user_id = \Auth::getUser()->id;

        DB::transaction(function () use ($post, $request) {
            $post->save();
            $post->reattachCategories($request->categories);
        });

        return redirect()
            ->route('admin.posts.index')
            ->with('success', __('Post successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Post $post
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', __('Post successfully deleted.'));
    }
}
