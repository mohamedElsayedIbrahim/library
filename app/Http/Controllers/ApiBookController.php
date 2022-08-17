<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{
    public function index()
    {       
        $books = Book::get();

        return response()->json($books);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if($book == null){
            return response()->json("Book is Not Found");
        }

        return response()->json($book);
    }

    public function destory($id)
    {
        $book = Book::find($id);

        if($book == null){
            return response()->json("Book is Not Found");
        }

        $imageName = $book->image;

        if($imageName != null){
            unlink(public_path('uploads/books/'.$imageName));
        }
        
        $book->delete();

        return response()->json("Book is deleted succfully");
        
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' =>'required|string|min:5|max:100',
            'price'=>'required|integer|min:10|max:50',
            'version'=>'nullable',
            'desc'=>'required|string',
            'image'=>'nullable|image|mimes:jpg,jpeg,png',
            'categories_id'=>'required',
            'categories_id:*'=>'exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator);
        }



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

        return response()->json("{message: Book is inserted succfully}");
    }
}
