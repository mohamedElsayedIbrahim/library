@extends('layouts.app')


@section('title','Add new book')


@section('content')
<div class="py-5">
@if($errors->any())
<ul>
@foreach ($errors->all() as $message)
    <li>{{$message}}</li>
@endforeach
</ul>
@endif

</div>

<form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">

    @csrf

    <label>Book Name</label>
    <input type="text" name="name" value="{{old('name')}}">
<br>
    <label>Book price</label>
    <input type="number" name="price" value="{{old('price')}}">
<div class="my-2">
    <label>Book version</label>
    <select name="version">
        <option value="new">New</option>
        <option value="old">Old</option>
    </select>
</div>

    <label>Book image</label>
    <input type="file" name="image" value="{{old('image')}}">
<br>
    <label>Book description</label>
    <textarea name="desc"  cols="30" rows="5">{{old('desc')}}</textarea>
<br>

<div class="my-2">
    <label>Book Category</label>
    @foreach ($categories as $item)
    <input class="form-check-input" name="categories_id[]" type="checkbox" value="{{$item->id}}" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
      {{$item->name}}
    </label>
    @endforeach
    
</div>

    <div>
        <button type="submit" class="btn btn-primary">Save Data</button>
        <a class="btn btn-secondary" href="{{ route('books.index') }}">back</a>
    </div>

</form>


@endsection