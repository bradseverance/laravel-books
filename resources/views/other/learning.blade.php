@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">
  <div class="content">
    <div class="title m-b-md add-top">I'm Using Laravel</div>
    <p>The <a href="https://laravel.com/docs/5.8/blade" target="_blank">Blade templating engine</a> is really cool.</p>
    <h3>if's and variables</h3>
    
    <div>
      <p>{{ "hello" }}</p>

      @if(1 == 1)
          <p>One does, in fact, equal one</p>
      @endif

      @if(1 == 2)
          <p>One does equal two.</p>
      @else
          <p>One does not equal two.</p>
      @endif
    </div>

    <h3>Looping</h3>
    @for($i = 0; $i < 5; $i++)
      <p>This is paragraph number {{$i + 1}}</p>
    @endfor

    <h3>XSS (escaped vs. unescaped)</h3>

    {{ "<p>I'm escaped</p>" }}
    {!! "<p>I'm unescaped</p>" !!}

    <!-- sample blog post -->
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h1>Learning Larvel</h1>
          <p>This blog post will teach you stuff and things.</p>
          <p><a href="#">Read More ....</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection