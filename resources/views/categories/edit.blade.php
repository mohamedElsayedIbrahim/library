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

<form method="POST" action="{{ route('categories.update',$category->id) }}">

    @csrf

    <label>category Name</label>
    <input value="{{old('name') ?? $category->name}}" type="text" name="name">
<br>

    <div>
        <button type="submit" class="btn btn-primary">Save Data</button>
        <a class="btn btn-secondary" href="{{ route('categories.index') }}">back</a>
    </div>

</form>


@endsection