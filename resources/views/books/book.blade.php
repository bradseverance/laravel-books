@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">
  <div class="content-left">
    <img id="book-img" class="add-bottom" alt="Brad's Books" src="{{ asset('imgs/book.png') }}" />
    <h2>Book ID: {{ $book['Id'] }}</h2>
    <p class="book-p"><strong>Part Number: </strong>{{ $book['PartNo'] }}</p>
    <p class="book-p"><strong>Title: </strong>{{ $book['Title'] }}</p>
    <p class="book-p"><strong>Author: </strong>{{ $book['Author'] }}</p>
    <p>
      <a
        href="{{ route('books.books') }}"
        type="button"
        class="btn btn-primary btn-sm"
      >Return To List</a>
    </p>
  </div>
</div>
@endsection