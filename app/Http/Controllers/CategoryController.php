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
}
