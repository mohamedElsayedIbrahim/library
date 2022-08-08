@extends('layouts.app')

@section('title')
    Books |
@endsection

@section('content')
    <h1>{{$book->name}}</h1>
    <p>{{$book->desc}}</p>
    <ul>
        <li>{{$book->price}}</li>
        <li>{{$book->version}}</li>
    </ul>
    <div class="pt-3">
        <a href="{{route('books.index')}}" class="btn btn-info">back</a>
    </div>
@endsection