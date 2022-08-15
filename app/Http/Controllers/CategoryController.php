<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(3);
        return view('categories.index',compact('categories'));
    }

    public function show($id){
        $category = Category::findOrFail($id);
        return view('categories.show',compact('category'));
    }

    public function add()
    {
        return view('categories.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|min:5|max:100|unique:categories,name',
        ]);

        Category::create([
            'name'=> $request->name,
        ]);

        return redirect()->route('categories.index');
    }


    public function edit($id){
        $category = Category::findOrFail($id);
        return view('categories.edit',compact('category'));
    }


    public function update($id, Request $request){
        $request->validate([
            'name' =>'required|string|min:5|max:100|unique:categories,name',
        ]);

        $category = Category::find($id);
        

        $category->update([
            'name'=> $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function destory($id)
    {
        $category = Category::findOrFail($id);        
        $category->delete();
        return redirect()->route('categories.index');
    }
}
