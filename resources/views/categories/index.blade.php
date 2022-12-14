@extends('layouts.app')

@section('title')
Categories
@endsection

@section('content')

<div class="my-3">
<a class="btn btn-primary" href="{{ route('categories.add') }}">Add New Category</a>
</div>

    @foreach ($categories as $item)
        <h3><a href="{{ route('categories.show', $item->id) }}">{{$item->name}}</a></h3>
        
        <div>
        <a href="{{route('categories.edit',$item->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('books.destory', $item->id)}}" class="btn btn-danger">Remove</a>
        </div>
        <hr>

    @endforeach

    {{$categories->links()}}

@endsection