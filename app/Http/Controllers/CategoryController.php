<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst=Category::all();
        return view('categories.category-index',['lst'=>$lst]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $lst=Category::all();
        // return view('categories.category-create',['lst'=>$lst]);
        return view('categories.category-create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $cate = Category::create([
            'name'=>$request->name,
        ]);
        $cate->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $lst=Category::all();
        return view('categories.category-edit',['cate'=>$category,'lst'=>$lst]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        $category->save();
        
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
