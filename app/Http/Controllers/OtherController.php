<?php

namespace App\Http\Controllers;

class otherController extends Controller {

  // ------------------------------- //
  // welcome page (index)            //
  // ------------------------------- //
  public function welcome () {

    return view('other.welcome');

  }

  // ------------------------------- //
  // learning laravel                //
  // ------------------------------- //
  public function learning () {

    return view('other.learning');

  }

  // ------------------------------- //
  // about page                      //
  // ------------------------------- //
  public function about () {

    return view('other.about');

  }

  // ------------------------------- //
  // admin index                     //
  // ------------------------------- //
  public function adminIndex () {

    return view('admin.index');

  }

}
