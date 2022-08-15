<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id','DESC')->paginate(3);
        return view('books.index',compact('books'));
    }

    public function show($id){
        $book = Book::findOrFail($id);
        return view('books.show',compact('book'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('books.new',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|min:5|max:100',
            'price'=>'required|integer|min:10|max:50',
            'version'=>'nullable',
            'desc'=>'required|string',
            'image'=>'nullable|image|mimes:jpg,jpeg,png',
            'categories_id'=>'required',
            'categories_id:*'=>'exists:categories,id'
        ]);



        $image = $request->file('image');
        $extention = $image->getClientOriginalExtension();
        $newImageName = uniqid().'.'.$extention;
        $image->move(public_path('uploads/books'),$newImageName);

        $book = Book::create([
            'name'=> $request->name,
            'desc'=> $request->desc,
            'price' => $request->price,
            'version'=>$request->version,
            'image'=>$newImageName,
        ]);

        $book->categories()->sync($request->categories_id);

        return redirect()->route('books.index');
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edit',compact('book','categories'));
    }

    public function update($id, Request $request){
        $request->validate([
            'name' =>'required|string|min:5|max:100',
            'price'=>'required|integer|min:10|max:50',
            'version'=>'nullable',
            'desc'=>'required|string',
            'image'=>'nullable|image|mimes:jpg,jpeg,png',
            'categories_id'=>'required',
            'categories_id:*'=>'exists:categories,id'
        ]);

        $book = Book::find($id);
        $imageName = $book->image;

        if($request->hasFile('image')){
            if($imageName != null){
                unlink(public_path('uploads/books/'.$imageName));
            }
            
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $imageName = uniqid().'.'.$extention;
            $image->move(public_path('uploads/books'),$imageName);
        }

        $book->update([
            'name'=> $request->name,
            'desc'=> $request->desc,
            'price' => $request->price,
            'version'=>$request->version,
            'image'=>$imageName,
        ]);
        $book->categories()->sync($request->categories_id);
        return redirect()->route('books.index');
    }

    public function destory($id)
    {
        $book = Book::findOrFail($id);
        $imageName = $book->image;

        if($imageName != null){
            unlink(public_path('uploads/books/'.$imageName));
        }
        
        $book->delete();
        return redirect()->route('books.index');
    }
}
