<?php

namespace App;

class Book {

  // -------------------------------------------------//
  // Non-Admin Methods                                //
  // -------------------------------------------------//

  // ------------------------------- //
  // list books                      //
  // ------------------------------- //
  public function listBooks ($session) {

    // get dummy data if books don't exist
    if (!$session->has('books')) {
      $this->dummyData($session);
    }

    return $session->get('books');

  }

  // ------------------------------- //
  // get a book                      //
  // ------------------------------- //
  public function getBook ($session, $id) {

    // get dummy data if books don't exist
    if (!$session->has('books')) {
      $this->dummyData($session);
    }

    return $session->get('books')[$id];

  }

  // -------------------------------------------------//
  // Admin Methods                                    //
  // -------------------------------------------------//

  // ------------------------------- //
  // update book                     //
  // ------------------------------- //
  public function updateBook ($session) {

    // let's just assume we have a book and get it
    $aBook = $session->get('book');
    // make a variable for books
    $books = $session->get('books');
    // remove book from books
    unset($books[$aBook['Id']]);
    // add updated book
    $books[$aBook['Id']] = $aBook;
    // not necessarily sure why I need to do this
    $session->put('books', $books);

  }

  // ------------------------------- //
  // create book                     //
  // ------------------------------- //
  public function createBook ($session) {

    // let's just assume we have a book and get it
    $aBook = $session->get('book');
    // make a variable for books
    $books = $session->get('books');
    // get book keys    
    $bookIds = array_keys($books);
    // create new id
    $maxId = empty($bookIds) ? 1 : max($bookIds) + 1;
    // add id to book
    $aBook['Id'] = $maxId;
    // add book to books
    $books[$maxId] = $aBook;
    // not necessarily sure why I need to do this
    $session->put('books', $books);

  }

  // ------------------------------- //
  // delete book                     //
  // ------------------------------- //
  public function deleteBook ($session, $id) {

    // make a variable for books
    $books = $session->get('books');
    // remove book from books
    unset($books[$id]);
    // not necessarily sure why I need to do this
    $session->put('books', $books);

  }

  // ------------------------------- //
  // dummy data                      //
  // ------------------------------- //
  private function dummyData ($session) {

    $books = [
      1 => [
        'Id' => 1,
        'PartNo' => '34-4534',
        'Title' => 'To the Lighthouse',
        'Author' => 'Virgina Woolf'
      ],
      2 => [
        'Id' => 2,
        'PartNo' => '51-7665',
        'Title' => 'The Red and the Black',
        'Author' => 'Stendhal'
      ],
      3 => [
        'Id' => 3,
        'PartNo' => '55-7665',
        'Title' => 'The Odyssey',
        'Author' => 'Homer'
      ],
      4 => [
        'Id' => 4,
        'PartNo' => '34-9987',
        'Title' => 'Snow Crash',
        'Author' => 'Neal Stephenson'
      ],
      5 => [
        'Id' => 5,
        'PartNo' => '59-3009',
        'Title' => 'I, Claudius',
        'Author' => 'Robert Graves'
      ],
      6 => [
        'Id' => 6,
        'PartNo' => '25-6912',
        'Title' => 'Dead Souls',
        'Author' => 'Nikoli Gogol'
      ]
    ];

    $session->put('books', $books);

    return $books;

  }



}