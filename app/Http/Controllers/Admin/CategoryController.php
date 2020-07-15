<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::orderByDesc('updated_at')->get();

        return view('admin.categories', compact('categories'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.category', ['category' => null]);
    }

    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category($request->all());
        $category->active = $request->has('active');
        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', __('Category successfully created.'));
    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.category', ['category' => $category]);
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $category->fill($request->all());
        $category->active = $request->has('active');
        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', __('Category successfully updated.'));
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', __('Category successfully deleted.'));
    }
}
