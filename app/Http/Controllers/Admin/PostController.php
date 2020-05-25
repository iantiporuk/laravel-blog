<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderByDesc('updated_at')->get();

        return view('admin.posts', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('active', true)->get();

        return view('admin.post', ['post' => null, 'categories' => $categories]);
    }

    public function createSubmit(PostRequest $request)
    {
        $post = new Post;

        DB::transaction(function () use ($post, $request) {
            $post = $this->fillPostFromRequest($post, $request);
            $post->save();
            $post->reattachCategories($request->categories);
        });

        return redirect()->route('admin-posts')->with('success', __('Post successfully created.'));
    }

    public function update(int $id)
    {
        $post = Post::find($id);

        $categories = Category::where('active', true)->get();

        if (!$post) {
            return $this->redirectToPostsListWithNotFoundError($id);
        }

        return view('admin.post', ['post' => $post, 'categories' => $categories]);
    }

    public function updateSubmit(int $id, PostRequest $request)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->redirectToPostsListWithNotFoundError($id);
        }

        DB::transaction(function () use ($post, $request) {
            $post = $this->fillPostFromRequest($post, $request);
            $post->save();
            $post->reattachCategories($request->categories);
        });

        return redirect()->route('admin-posts')->with('success', __('Post successfully updated.'));
    }

    public function delete(int $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->redirectToPostsListWithNotFoundError($id);
        }

        $post->delete();

        return redirect()->route('admin-posts')->with('success', __('Post successfully deleted.'));
    }

    public function activate(int $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->redirectToPostsListWithNotFoundError($id);
        }

        $post->active = true;
        $post->save();

        return redirect()->route('admin-posts')->with('success', __('Post successfully activated.'));
    }

    public function deactivate(int $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->redirectToPostsListWithNotFoundError($id);
        }

        $post->active = false;
        $post->save();

        return redirect()->route('admin-posts')->with('success', __('Post successfully deactivated.'));
    }

    private function fillPostFromRequest(Post $post, PostRequest $request): Post
    {

        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = \Auth::getUser()->id;
        $post->active = (bool)$request->activate ?? false;

        return $post;
    }

    private function redirectToPostsListWithNotFoundError(int $id)
    {
        return redirect()->route('admin-posts')->with('error', __('Can not find post with id = ') . $id);
    }

}
