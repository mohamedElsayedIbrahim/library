@extends('layouts.app')

@section('title')
    Books
@endsection

@section('content')

@auth
@if (Auth::user()->type == 'admin')
    <div class="my-3">
        <a class="btn btn-primary" href="{{ route('books.add') }}">Add New Book</a>
    </div>
@endif
@endauth

@if(count($books) > 0)
    @foreach ($books as $item)
    <img class="img-fluid" src="{{ asset('uploads/books/'.$item->image) }}" width="300" height="300">
        <h3><a href="{{ route('books.show', $item->id) }}">{{$item->name}}</a></h3>
        <p>{{$item->desc}}</p>
        <small>{{$item->price}}</small>
        <div>
        @auth
        @if (Auth::user()->type == 'admin')
        <a href="{{route('books.edit',$item->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('books.destory', $item->id)}}" class="btn btn-danger">Remove</a>
        @else
        <a href="#" class="btn btn-info">Add To Cart</a>
        @endif
        @endauth
        </div>
        <hr>

    @endforeach

    {{$books->links()}}
@else

<p>There are no data</p>

@endif

@endsection