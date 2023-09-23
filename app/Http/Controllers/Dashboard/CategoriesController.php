<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        $category = new Category();

        return view('dashboard.categories.create', compact('parents','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $request->merge(
            [
                'slug' => Str::slug($request->name),
            ]
        );
        $data = $request->except('image');
        if($request->hasFile('image'))
        {
            $image = $request->file('image') ;
            $path = $image->storeAs('Categories_image',$request->name.'_image','public');
            $data['image']=$path;
        }
//        dd($request,$data);
        $category = Category::create( $data );
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
    public function edit($id)
    {
        try {
            $category = Category::with('descendants')->findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->route('categories.index')
                ->with('info', 'Record not found!');
        }

        $ids = $this->getCategoryIds($category->descendants);
        array_push($ids, $id);

        $parents = Category::whereNotIn('id', $ids)->get();

        return view('dashboard.categories.edit', compact('category', 'parents'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validatexd());

        return redirect(route('categories.index'))->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function getCategoryIds($categories)
    {
        $ids = [];
        foreach ($categories as $category) {
            $ids[] = $category->id;
            if ($category->children->isNotEmpty()) {
                $ids = array_merge($ids, $this->getCategoryIds($category->children));
            }
        }

        return $ids;
    }
}
