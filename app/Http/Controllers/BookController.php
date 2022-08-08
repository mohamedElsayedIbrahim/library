<?php

namespace App\Http\Controllers;

use App\Book;
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
        return view('books.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|min:5|max:100',
            'price'=>'required|integer|min:10|max:50',
            'version'=>'nullable',
            'desc'=>'required|string'
        ]);

        Book::create([
            'name'=> $request->name,
            'desc'=> $request->desc,
            'price' => $request->price,
            'version'=>$request->version
        ]);

        return redirect()->route('books.index');
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('books.edit',compact('book'));
    }

    public function update($id, Request $request){
        $request->validate([
            'name' =>'required|string|min:5|max:100',
            'price'=>'required|integer|min:10|max:50',
            'version'=>'nullable',
            'desc'=>'required|string'
        ]);

        $book = Book::find($id);

        $book->update([
            'name'=> $request->name,
            'desc'=> $request->desc,
            'price' => $request->price,
            'version'=>$request->version
        ]);

        return redirect()->route('books.index');
    }

    public function destory($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
