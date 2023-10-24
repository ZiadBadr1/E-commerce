<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Actions\CategoryActions\CreateCategoryAction;
use App\Actions\CategoryActions\DeleteCategoryAction;
use App\Actions\CategoryActions\ForceDeleteCategoryAction;
use App\Actions\CategoryActions\GetCategoriesIdsFromDescendantsAction;
use App\Actions\CategoryActions\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();

        $categories = Category::with('parent')->filter($request->query())->paginate(5);

        return view('dashboard.admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        $category = new Category();

        return view('dashboard.admin.categories.create', compact('parents', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request, CreateCategoryAction $createCategoryAction)
    {
        //        dd($request->validated());
        $createCategoryAction->execute($request->validated());

        return redirect()->route('admin.categories.index')->with('success', 'Category Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, GetCategoriesIdsFromDescendantsAction $getCategoriesIdsFromDescendantsAction)
    {
        try {
            $category->load('descendants');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')
                ->with('info', 'Record not found!');
        }

        $ids = $getCategoriesIdsFromDescendantsAction->execute($category->descendants);
        $ids[] = $category->id;

        $parents = Category::whereNotIn('id', $ids)->get();

        return view('dashboard.admin.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryStoreRequest $request, UpdateCategoryAction $updateCategoryAction)
    {
        $updateCategoryAction->execute($category, $request->validated());

        return redirect(route('admin.categories.index'))->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, DeleteCategoryAction $deleteCategoryAction)
    {
        $deleteCategoryAction->execute($category);

        return redirect(route('admin.categories.index'))->with('success', 'Category deleted successfully');
    }

    public function restore($slug)
    {
        $category = Category::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $category->restore();

        return redirect()->route('admin.categories.index');

    }

    public function trash()
    {
        $request = request();
        $categories = Category::onlyTrashed()->with('parent')->filter($request->query())->paginate(5);

        return view('dashboard.admin.categories.trash', compact('categories'));
    }

    public function forceDelete(string $slug, ForceDeleteCategoryAction $forceDeleteCategoryAction)
    {
        $category = Category::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $forceDeleteCategoryAction->execute($category);

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted forever');
    }
}
