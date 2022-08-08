@extends('layouts.app')

@section('title')
    Books
@endsection

@section('content')

<div class="my-3">
<a class="btn btn-primary" href="{{ route('books.add') }}">Add New Book</a>
</div>

    @foreach ($books as $item)
        <h3><a href="{{ route('books.show', $item->id) }}">{{$item->name}}</a></h3>
        <p>{{$item->desc}}</p>
        <small>{{$item->price}}</small>
        <div>
        <a href="{{route('books.edit',$item->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('books.destory', $item->id)}}" class="btn btn-danger">Remove</a>
        </div>
        <hr>

    @endforeach

    {{$books->links()}}

@endsection