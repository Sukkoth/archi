<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
       return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request){
        if(Category::create($request->validated()))
            Toastr::success("Successfull", "Category created");
        else
            Toastr::error("Error", "Try again");
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, CreateCategoryRequest $request){
        if($category->update($request->validated()))
           Toastr::success("Successfull", "Category updated");
        else
            Toastr::error("Error", "Try again");
        return redirect()->back();
    }

    public function delete(Category $category){
        if($category->delete())
            Toastr::success("Successfull", "Category Deleted");
        else
            Toastr::success("Error", "Try again");
        return redirect()->back();
    }
}
