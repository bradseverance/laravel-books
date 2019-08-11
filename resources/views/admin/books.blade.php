@extends('layouts.admin')

@section('content')
<div class="flex-center position-ref full-height">
  <div class="content">
    <h1>Books Inventory</h1>
    @if(Session::has('response'))
      <div class="alert alert-success" role="alert">{!! Session::get('response') !!}</div>
    @endif
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Author</th>
          <th scope="col">Title</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($books as $book)
          <tr>
            <td scope="row">{{ $book['PartNo'] }}</td>
            <td>{{ $book['Author'] }}</td>
            <td>{{ $book['Title'] }}</td>
            <td>
              <a href="{{ route('admin.editBook', [ 'id' => $book['Id'] ]) }}" class="btn btn-primary btn-sm btn-edit-book">Edit</a>
              <a href="{{ route('admin.deleteBook', [ 'id' => $book['Id'] ]) }}" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
        @empty
          <tr><td scope="row" colspan="4">No Books!!</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection