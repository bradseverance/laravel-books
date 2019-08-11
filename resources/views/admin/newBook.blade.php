@extends('layouts.admin')
@section('content')
<div class="flex-center position-ref full-height">
  <form action="{{ route('admin.createAdminBook') }}" method="post">
    <h1>Add New Book</h1>
    @if(Session::has('response'))
      <div class="alert alert-danger" role="alert">{{ Session::get('response') }}</div>
    @endif    
    <div class="form-row">
      <div class="form-group col-md-12 book-form-group">
        <label for="title">Part Number</label>
        <input
          type="text"
          class="form-control @error('PartNo') is-invalid @enderror"
          id="partno"
          name="partno"
          placeholder="Part Number"
          value="{{ $book['PartNo'] }}"
        >
        @error('PartNo')
          <div class="invalid-feedback">Part Number is required (NN-NNNN)</div>
        @enderror
        <label for="title">Title</label>
        <input
          type="text"
          class="form-control @error('Title') is-invalid @enderror"
          id="title"
          name="title"
          placeholder="Title"
          value="{{ $book['Title'] }}"
        >
        @error('Title')
          <div class="invalid-feedback">Title is Required</div>
        @enderror
        <label for="author">Author</label>
        <input
          type="text"
          class="form-control @error('Author') is-invalid @enderror"
          id="author"
          name="author"
          placeholder="Author"
          value="{{ $book['Author'] }}"
        >
        @error('Title')
          <div class="invalid-feedback">Author is Required</div>
        @enderror
      </div>
      {{ csrf_field() }}
    </div>
    <button type="submit" class="btn btn-primary">Add Book</button>
  </form>
</div>
@endsection