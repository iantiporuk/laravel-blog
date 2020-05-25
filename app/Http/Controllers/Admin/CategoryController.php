<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderByDesc('updated_at')->get();

        return view('admin.categories', compact('categories'));
    }

    public function create()
    {

        return view('admin.category', ['category' => null]);
    }

    public function createSubmit(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;
        $category->active = (bool)$request->activate ?? false;
        $category->save();

        return redirect()->route('admin-categories')->with('success', __('Category successfully created.'));
    }

    public function update(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->redirectToCategoriesListWithNotFoundError($id);
        }

        return view('admin.category', ['category' => $category]);
    }

    public function updateSubmit(int $id, Request $request)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->redirectToCategoriesListWithNotFoundError($id);
        }

        $category->name = $request->name;
        $category->active = (bool)$request->activate ?? false;
        $category->save();

        return redirect()->route('admin-categories')->with('success', __('Category successfully updated.'));
    }

    public function delete(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->redirectToCategoriesListWithNotFoundError($id);
        }

        $category->delete();

        return redirect()->route('admin-categories')->with('success', __('Category successfully deleted.'));
    }

    public function activate(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->redirectToCategoriesListWithNotFoundError($id);
        }

        $category->active = true;
        $category->save();

        return redirect()->route('admin-categories')->with('success', __('Category successfully activated.'));
    }

    public function deactivate(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->redirectToCategoriesListWithNotFoundError($id);
        }

        $category->active = false;
        $category->save();

        return redirect()->route('admin-categories')->with('success', __('Category successfully deactivated.'));
    }

    private function redirectToCategoriesListWithNotFoundError(int $id)
    {
        return redirect()->route('admin-categories')->with('error', __('Can not find category with id = ') . $id);
    }

}
