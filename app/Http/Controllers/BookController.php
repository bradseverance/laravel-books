<?php

namespace App\Http\Controllers;

use App\Book;
// inject request class
use \Illuminate\Http\Request as RequestProvider;
// inject validator class
use \Illuminate\Validation\Factory as ValidationProvider;
use function Opis\Closure\serialize;

class BookController extends Controller {

  // ------------------------------- //
  // getBooks                        //
  // ------------------------------- //
  public function getBooks (RequestProvider $request) {

    $book = new Book();
    $books = $book->listBooks($request->session());

    return view('books.books', [ 'books' => $books ]);

  }

  // ------------------------------- //
  // getBook                         //
  // ------------------------------- //
  public function getBook (RequestProvider $request, $id) {

    $book = new Book();
    $aBook = $book->getBook($request->session(), $id);

    return view('books.book', [ 'book' => $aBook ]);

  }

  // ------------------------------- //
  // getAdminBook                    //
  // ------------------------------- //
  public function getAdminBook (RequestProvider $request, $id) {

    $book = new Book();
    $aBook = $book->getBook($request->session(), $id);

    // load book into session if book does not exist from update
    if (!$request->session()->get('book')) {
      $request->session()->put('book', $aBook);
    }

    return view('admin.editBook', [
      'book' => $request->session()->get('book')
    ]);

  }

  // ------------------------------- //
  // getAdminBooks                   //
  // ------------------------------- //
  public function getAdminBooks (RequestProvider $request) {

    $book = new Book();
    $books = $book->listBooks($request->session());

    // if a book is in session, then remove it
    if ($request->session()->get('book')) {
      $request->session()->forget('book');
    }

    return view('admin.books', [ 'books' => $books ]);

  }

  // ------------------------------- //
  // newAdminBook                    //
  // ------------------------------- //
  public function newAdminBook (RequestProvider $request) {


    // load new book into session
    // if not redirected from create
    if (!$request->session()->get('book')) {
      $request->session()->put('book', [
        'Id' => 0,
        'PartNo' => '',
        'Title' => '',
        'Author' => ''
      ]);
    }

    return view('admin.newBook', [
      'book' => $request->session()->get('book')
    ]);

  }

  // ------------------------------- //
  // createAdminBook                 //
  // ------------------------------- //
  public function createAdminBook (
    RequestProvider $request,
    ValidationProvider $validator
  ) {

    // load book into session
    $request->session()->put('book', [
      'PartNo' => $request->input('partno'),
      'Title' => $request->input('title'),
      'Author' => $request->input('author')
    ]);
    
    $aBook = $request->session()->get('book');

    $validation = $validator->make($aBook, [
      'PartNo' => 'required|regex:/\d\d-\d\d\d\d/',
      'Author' => 'required|min:3|max:255',
      'Title' => 'required|min:1|max:255'
    ]);

    if ($validation->fails()) {

      return redirect()
        ->route('admin.newBook')
        ->withErrors($validation)
        ->withInput()
        ->with(['response' => 'There are problems with your inputs.']);

    } else {

      // update book in books
      $book = new Book();
      $book->createBook($request->session());

      return redirect()
        ->route('admin.books')
        ->with(['response' => 'The book was successfully created. Good job!']);

    }

  }

  // ------------------------------- //
  // updateAdminBook                 //
  // ------------------------------- //
  public function updateAdminBook (
    RequestProvider $request,
    ValidationProvider $validator
  ) {

    // load book into session
    $request->session()->put('book', [
      'Id' => $request->input('id'),
      'PartNo' => $request->input('partno'),
      'Title' => $request->input('title'),
      'Author' => $request->input('author')
    ]);
    
    $aBook = $request->session()->get('book');

    $validation = $validator->make($aBook, [
      'PartNo' => 'required|regex:/\d\d-\d\d\d\d/',
      'Author' => 'required|min:3|max:255',
      'Title' => 'required|min:1|max:255'
    ]);

    if ($validation->fails()) {

      return redirect()
        ->route('admin.editBook', ['id' => $request->input('id')])
        ->withErrors($validation)
        ->withInput()
        ->with(['response' => 'There are problems with your inputs.']);

    } else {

      // update book in books
      $book = new Book();
      $book->updateBook($request->session());

      return redirect()
        ->route('admin.books')
        ->with(['response' => 'The book was successfully updated. Good job!']);

    }

  }

  // ------------------------------- //
  // deleteAdminBook                 //
  // ------------------------------- //
  public function deleteAdminBook (RequestProvider $request, $id) {

    // update book in books
    $book = new Book();
    $book->deleteBook($request->session(), $id);

    return redirect()
      ->route('admin.books')
      ->with(['response' => 'The book was successfully <strong>deleted</strong>. Good job!']);

  }

}
