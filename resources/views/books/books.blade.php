@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">
  <div class="content">
    <h1>Available Books</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Part Number</th>
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
              <a
                href="{{ route('books.book', [ 'id' => $book['Id'] ]) }}"
                type="button"
                class="btn btn-primary btn-sm"
              >View Details</a>
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