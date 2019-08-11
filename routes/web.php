<?php

// -------------------------------------------------//
// Web Routes                                       //
// -------------------------------------------------//

// Here is where you can register web routes for your application.
// These routes are loaded by the RouteServiceProvider within a group which
// contains the "web" middleware group.

// inject request class
use \Illuminate\Http\Request as RequestProvider;
// inject validator class
use \Illuminate\Validation\Factory as ValidationProvider;
use App\Http\Controllers\BookController;

// ------------------------------------------ //
// other routes                               //
// ------------------------------------------ //

// ------------------------------- //
// welcome page (index)            //
// ------------------------------- //
Route::get('/', [
  'uses' => 'OtherController@welcome',
  'as' => 'other.welcome'
]);

// ------------------------------- //
// learning laravel                //
// ------------------------------- //
Route::get('/learning', [
  'uses' => 'OtherController@learning',
  'as' => 'other.learning'
]);

// ------------------------------- //
// about page                      //
// ------------------------------- //
Route::get('/about', [
  'uses' => 'OtherController@about',
  'as' => 'other.about'
]);

// ------------------------------------------ //
// book routes                                //
// ------------------------------------------ //

// ------------------------------- //
// list books                      //
// ------------------------------- //
Route::get('books', [
  'uses' => 'BookController@getBooks',
  'as' => 'books.books'
]);

// ------------------------------- //
// display details for a book      //
// ------------------------------- //
Route::get('books/{id}', [
  'uses' => 'BookController@getBook',
  'as' => 'books.book'
]);

// ------------------------------------------ //
// adming routes                              //
// ------------------------------------------ //
Route::group(['prefix' => 'admin'], function () {

  // ------------------------------- //
  // admin home                      //
  // ------------------------------- //
  Route::get('', [
    'uses' => 'OtherController@adminIndex',
    'as' => 'admin.index'
  ]);
  
  // ------------------------------- //
  // new book form                   //
  // ------------------------------- //
  Route::get('new-book', [
    'uses' => 'BookController@newAdminBook',
    'as' => 'admin.newBook'
  ]);
  
  // ------------------------------- //
  // create book (redirects to list) //
  // ------------------------------- //
  Route::post('create-book', [
    'uses' => 'BookController@createAdminBook',
    'as' => 'admin.createAdminBook'
  ]);

  // ------------------------------- //
  // delete book (redirects to list) //
  // ------------------------------- //
  Route::get('delete-book/{id}', [
    'uses' => 'BookController@deleteAdminBook',
    'as' => 'admin.deleteBook'
  ]);
  
  // ------------------------------- //
  // edit form for existing book     //
  // ------------------------------- //
  Route::get('edit-book/{id}', [
    'uses' => 'BookController@getAdminBook',
    'as' => 'admin.editBook'
  ]);

  // ------------------------------- //
  // udpate book (redirects to list) //
  // ------------------------------- //
  Route::post('update-book', [
    'uses' => 'BookController@updateAdminBook',
    'as' => 'admin.updateAdminBook'
  ]);
  
  // ------------------------------- //
  // list books (admin)              //
  // ------------------------------- //
  Route::get('books', [
    'uses' => 'BookController@getAdminBooks',
    'as' => 'admin.books'
  ]);

});
