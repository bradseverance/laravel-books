<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('other.welcome') }}">Brad's Books</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">      
        <a
          class="nav-link @if (Request::route()->getName() == 'other.about') active @endif"
          href="{{ route('other.about') }}"
        >About</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link @if (Request::route()->getName() == 'other.learning') active @endif"
          href="{{ route('other.learning') }}"
        >Learning Laravel</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link @if (Request::route()->getName() == 'books.books') active @endif"
          href="{{ route('books.books') }}"
        >Show Me The Books!</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">Login</a>
      </li>
    </ul>
  </div>
</nav>
