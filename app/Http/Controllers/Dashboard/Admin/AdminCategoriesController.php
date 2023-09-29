<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Actions\CategoryActions\CreateCategoryAction;
use App\Actions\CategoryActions\DeleteCategoryAction;
use App\Actions\CategoryActions\GetCategoriesIdsFromDescendantsAction;
use App\Actions\CategoryActions\UpdateCategoryAction;
use App\Actions\ImageActions\DeleteImageAction;
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

        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        $category = new Category();

        return view('dashboard.categories.create', compact('parents', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request, CreateCategoryAction $createCategoryAction)
    {
        //        dd($request->validated());
        $createCategoryAction->execute($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category Created successfully');
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
    public function edit($id, GetCategoriesIdsFromDescendantsAction $getCategoriesIdsFromDescendantsAction)
    {
        try {
            $category = Category::with('descendants')->findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->route('categories.index')
                ->with('info', 'Record not found!');
        }

        $ids = $getCategoriesIdsFromDescendantsAction->execute($category->descendants);
        $ids[] = $id;

        $parents = Category::whereNotIn('id', $ids)->get();

        return view('dashboard.categories.edit', compact('category', 'parents'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryStoreRequest $request, string $id, UpdateCategoryAction $updateCategoryAction)
    {
        $category = Category::findOrFail($id);

        $updateCategoryAction->execute($category, $request->validated());

        return redirect(route('categories.index'))->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DeleteCategoryAction $deleteCategoryAction)
    {
        $category = Category::findOrFail($id);
        $deleteCategoryAction->execute($category);
        return redirect(route('categories.index'))->with('success', 'Category deleted successfully');
    }
    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('categories.index');

    }
    public function trash()
    {
        $request = request();
        $categories = Category::onlyTrashed()->with('parent')->filter($request->query())->paginate(5);

        return view('dashboard.categories.trash', compact('categories'));
    }
    public function forceDelete(string $id, DeleteImageAction $deleteImageAction)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $image = $category->image ;
        if($image)
        {
            $deleteImageAction->execute($image);
        }
        $category->forceDelete();
        return redirect()->route('categories.index')->with('success', 'Category deleted forever');
    }

}
