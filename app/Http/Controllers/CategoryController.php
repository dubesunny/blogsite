<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
       try{
        $attributes = $request->validated();
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['image'] = $request->file('image')->store('category');
        Category::create($attributes);
        return response()->json(['success'=>'Category added successfully']);
       }catch(Exception $e){
         return response()->json(['error' => $e->getMessage()]);
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
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try{
            $attributes = $request->validated();
            $attributes['slug'] = Str::slug($attributes['title']);
            if($request->hasFile('image')){
                 $image_path = public_path('storage/' . $category->getRawOriginal('image'));
                    if ($category->getRawOriginal('image') && file_exists($image_path)) {
                        unlink($image_path);
                    }
                    $attributes['image'] = request()->file('image')->store('category');
            }
            $category->update($attributes);
            return response()->json(['success','Category updated successfully']);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try{
            if($category->getRawOriginal('image') != null){
                Storage::disk('local')->delete($category->getRawOriginal('image'));
            }
            $category->delete();
            return response()->json(['success'=>'Category deleted successfully']);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
