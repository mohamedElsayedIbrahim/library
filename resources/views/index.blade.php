@extends('layouts.app')


@section('title','Home page')


@section('content')


<div class="row">
<div class="col-sm-4">
    <div class="card" style="width:18rem;">
        <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="{{ route('books.index') }}"><h5 class="card-title">books</h5></a>
          <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          b5
        </div>
      </div>
</div>

<div class="col-sm-4">
    <div class="card" style="width:18rem;">
        <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="{{ route('categories.index') }}"><h5 class="card-title">Categories</h5></a>
          <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          b5
        </div>
      </div>
</div>
</div>

@endsection