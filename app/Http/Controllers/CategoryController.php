<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Categories.index',[
           'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();
            $category_param = [
                'uuid' => Str::uuid()->toString(),
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'user_id' => auth()->id(),
            ];
            $category->create($category_param);
            DB::commit();
            return redirect()->back()->with('success', 'Added Category Successfully.');
        } catch (QueryException $queryException) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something want wrong.');
        }
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
        return view('Categories.edit',
        [
            'cat' => $category,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();
            $category_param = [
                'uuid' => Str::uuid()->toString(),
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'user_id' => auth()->id(),
            ];
            $category->update($category_param);
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Update Category Successfully.');
        } catch (QueryException $queryException) {
            DB::rollBack();
            return redirect()->route('category.index')->with('error', 'Something want wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
