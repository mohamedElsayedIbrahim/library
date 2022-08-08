@extends('layouts.app')

@section('title')
category |
@endsection

@section('content')
    <h1>{{$category->name}}</h1>
    
    <div class="pt-3">
        <a href="{{route('categories.index')}}" class="btn btn-info">back</a>
    </div>
@endsection