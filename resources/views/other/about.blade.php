@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">
  <div class="content">
    <img id="book-img" alt="Brad's Books" src="{{ asset('imgs/book.png') }}" />
    <div class="title m-b-md">About Books</div>  
    <h3>Books usually consist of many pages made of paper with words printed on them.</h3>
    <h3>Books are often instructive and entertaining. Reading is fun!</h3>
    <h3>You may want to buy a book from my store.</h3>
  </div>
</div>
@endsection