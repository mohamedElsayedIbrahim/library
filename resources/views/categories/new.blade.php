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

<form method="POST" action="{{ route('books.store') }}">

    @csrf

    <label>Book Name</label>
    <input type="text" name="name">
<br>
    <label>Book price</label>
    <input type="number" name="price">
<div class="my-2">
    <label>Book version</label>
    <select name="version">
        <option value="new">New</option>
        <option value="old">Old</option>
    </select>
</div>

    {{-- <label>Book image</label>
    <input type="file" name="image"> --}}
<br>
    <label>Book description</label>
    <textarea name="desc"  cols="30" rows="5"></textarea>

    <div>
        <button type="submit" class="btn btn-primary">Save Data</button>
        <a class="btn btn-secondary" href="{{ route('books.index') }}">back</a>
    </div>

</form>


@endsection